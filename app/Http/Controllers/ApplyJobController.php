<?php

namespace App\Http\Controllers;

use App\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'applicant_id' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'about_you' => 'required',
             'cv' => 'required|mimes:doc,docx,pdf,txt|max:2048'
        ]);
        if ($request->hasFile('cv')){
        $data = new ApplyJob();
        $data->applicant_id = $request->applicant_id;
        $data->qualification = $request->qualification;
        $data->experience = $request->experience;
        $data->about_you = $request->about_you;
            //upload file
        $cv=$request->file('cv')->store("document",'public');
        $data->cv=$cv;
        $data->save();
        return response()->json(['message'=>'Job applied Successfully!',$data], 200);
        }
    }

}
