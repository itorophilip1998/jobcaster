<?php

namespace App\Http\Controllers;

use App\NewFeeds;
use Illuminate\Http\Request;

class NewFeedsController extends Controller
{

    public function store(Request $request)
    {
        $table=new NewFeeds();
        $table->email=$request->email;
        $table->topic='News Feeds Update';
        $table->save();
        return response()->json(['message'=>'Saved Successfully!',$table], 200);
    }
    public function test()
    {

        return view('email.applyjobs');
        // return view('email.contactus');
        // return view('email.login');
        // return view('email.newsfeeds');
        // return view('email.register');
        // return view('email.postjobs');
        // return view('email.Logout');
    }

}
