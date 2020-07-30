<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Posting;
use Illuminate\Http\Request;

class PostingController extends Controller
{

    public function index()
    {
         $data = Posting::latest()->paginate(10);
         return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'managers_id' => 'required',
            'user_id' => 'required',
            'job_title' => 'required',
            'job_type' => 'required',
            'job_description' => 'required',
            'job_requirement' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'salary_range' => 'nullable',
            'company_email' => 'required|email',
        ]);

        $data = new Posting();
        $data->managers_id = $request->managers_id;
        $data->user_id =  $request->user_id;
        $data->job_title = $request->job_title;
        $data->job_type = $request->job_type;
        $data->job_description = $request->job_description;
        $data->job_requirement = $request->job_requirement;
        $data->company_name = $request->company_name;
        $data->company_address = $request->company_address;
        $data->salary_range = $request->salary_range;
        $data->company_email = $request->company_email;
        $data->save();
        return response()->json(['message'=>'Create post successfully!',$data], 200);
    }


    public function show($id)
    {
        $data = Posting::find($id);
        return response()->json(['message'=>'Showing Single post',$data], 200);
    }


    public function updatejob(Request $request,$id)
    { 
        $this->validate($request, [
            'managers_id' => 'required',
            'user_id' => 'required',
            'job_title' => 'required',
            'job_type' => 'required',
            'job_description' => 'required',
            'job_requirement' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'salary_range' => 'nullable',
            'company_email' => 'required|email',
        ]);

        $data = Posting::find($id);
        $data->managers_id = $request->managers_id;
        $data->user_id =  $request->user_id;
        $data->job_title = $request->job_title;
        $data->job_type = $request->job_type;
        $data->job_description = $request->job_description;
        $data->job_requirement = $request->job_requirement;
        $data->company_name = $request->company_name;
        $data->company_address = $request->company_address;
        $data->salary_range = $request->salary_range;
        $data->company_email = $request->company_email;
        $data->save();
        return response()->json(['message'=>'Update post Successfully!',$data], 200);
    }

    public function destroy($id)
    {
        $data = Posting::find($id);
        $data->delete();
        return response()->json(['message'=>'Delete post Successfully!',$data], 200);
    }
}
