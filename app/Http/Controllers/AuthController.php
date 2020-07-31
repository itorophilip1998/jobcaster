<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Managers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AuthController extends Controller
{

    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);
        // Create User
        $user=new User();
        $user->role=$request->role;
        $user->email=$request->email;
        $user->name=$request->name;
        $user->password = Hash::make($request->password);
        $user->save(); 
        // Create profile
        $findId=User::all()->last()->id;
        if($request->role=='Manager') {
            $table=new Managers();
            $table->phone=null;
            $table->address=null;
            $table->company=null;
            $table->twitter=null;
            $table->facebook=null;
            $table->profile_photo=null;
            $table->user_id=$findId;
            $table->save();
        }

        // Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name);

        // }
        $token = auth()->attempt(['email' =>$request->email, 'password' =>$request->password]);
        return response()->json([
            'code'   => 200,
            'status' => true,
            'message'=> "Register Success",
            'token' => $token
        ], 200);
    }

  /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
          $me=User::where('id',Auth::id())->with('applicants','managers')->get();
          $message=[
            'AuthUser' => $me,
            'code' => 200,
            'message' => "Logged In"
        ];
          if($me)
           {
            return response()->json($message);
           }
           else{
            $message['message']='You are not Login';
            return response()->json($message);
           }


    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
