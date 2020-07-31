<?php

namespace App\Http\Controllers;

use App\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{

    public function applied($id){
      $data=ApplyJob::where('manager_id',$id)->get();
      return response()->json($data,200);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'about_you' => 'required',
            'cv' => 'required|mimes:doc,docx,pdf,txt',
            'qualification' => 'required',
            'experience' => 'required',
            'post_id' => 'required',
            'manager_id' => 'required'
        ]);
        if ($request->hasFile('cv')){
        $data = new ApplyJob();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->nationality = $request->nationality;
        $data->state = $request->state;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->about_you = $request->about_you;
            //upload file
        $cv=$request->file('cv')->store("document",'public');
        $data->cv=$cv;
        $data->qualification = $request->qualification;
        $data->experience = $request->experience;
        $data->post_id = $request->post_id;
        $data->manager_id = $request->manager_id;
        $data->save();
        return response()->json(['message'=>'Job applied Successfully!',$data], 200);
        }
    }

}
