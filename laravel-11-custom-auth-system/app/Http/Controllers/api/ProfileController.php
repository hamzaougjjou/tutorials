<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //get user information
    public function index(){
        return view('auth.profile');
    }

    //update user name and email
    public function update(Request $request){
        //all update log here 

        return back()->with("message" , "profile updated successfully");
    }
}
