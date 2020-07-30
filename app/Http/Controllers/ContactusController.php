<?php

namespace App\Http\Controllers;

use App\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{

    public function store(Request $request)
    {
        $table=new Contactus();
        $table->name=$request->name;
        $table->email=$request->email;
        $table->text=$request->text;
        $table->save();
        return response()->json(['message'=>'Saved Successfully!',$table], 200);
    }
    

}
