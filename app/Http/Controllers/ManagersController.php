<?php

namespace App\Http\Controllers;

use App\Managers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagersController extends Controller
{


    public function update(Request $request, $id)
    {
        $table=Managers::findornew($id);
        $table->phone=$request->phone;
        $table->address=$request->address;
        $table->company=$request->company;
        $table->twitter=$request->twitter;
        $table->facebook=$request->facebook;
        if($request->hasFile('profile_photo'))
            {
                $photo=$request->file('profile_photo')->store("photos",'public');
                $table->profile_photo= $photo;
            }
            else
            {
                $table->profile_photo= null;
            }
        $table->user_id=  $id;
        $table->save();
            $message=[
                'code' => 200,
                'user' => User::where('id',$id)->with('managers')->get(),
                'message' => "Created"
            ];
            return response()->json($message);
    }

}
