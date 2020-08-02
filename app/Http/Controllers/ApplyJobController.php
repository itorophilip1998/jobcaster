<?php

namespace App\Http\Controllers;

use App\ApplyJob;
use App\Mail\ApplyJob as MailApplyJob;
use App\Posting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $data->cv=$request->cv;
        $data->qualification = $request->qualification;
        $data->experience = $request->experience;
        $data->post_id = $request->post_id;
        $data->manager_id = $request->manager_id;
        $data->save();
        // return response()->json(['message'=>'Job applied Successfully Saved!',$data], 200);
        // Send Email To manager,Applicant and Company 
        $company=Posting::where('managers_id',$request->manager_id)->pluck('company_name')->first();
        $manager=Posting::where('managers_id',$request->manager_id)->pluck('job_title')->first();
        $managerMail=User::where('id',$request->manager_id)->pluck('email')->first();
        $companyMail=Posting::where('managers_id',$request->manager_id)->pluck('company_name')->first(); 
        // dd($manager,$company);
        Mail::to($request->email)->send(new MailApplyJob($data,$manager,$company));
        Mail::to($companyMail)->send(new MailApplyJob($data,$manager,$company));
        Mail::to($managerMail)->send(new MailApplyJob($data,$manager,$company));
        }
    }

}
