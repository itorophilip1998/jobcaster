<?php

namespace App\Http\Controllers;

use App\User;
use App\Applicant;
use App\Managers;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{

    public function update(Request $request, $id)
    {
            $table=Applicant::find($id);
            $table->phone=$request->phone;
            $table->address=$request->address;
            $table->nationality=$request->nationality;
            $table->state=$request->state;
            $table->dob=$request->dob;
            $table->gender=$request->gender;
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
            $table->user_id=$id;
            $table->save();
            $message=[
                'code' => 200,
                'user' => User::where('id',$id)->get(),
                'message' => "Logged In"
            ];
            return response()->json($message);
    }


}
