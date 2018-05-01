<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\FRD;
use App\User;

class UserController extends Controller
{
    public function MyRequests(){
        $user_id = auth()->id();
        $myrequests['myfrd'] =FRD::where('user_id',$user_id)->orderBy('id', 'des')->paginate(15);
        return view("myrequests",$myrequests);
    }
    public function MyProfile(){
        $user_id= auth()->id();
        $myprofile['profile']=User::where('id',$user_id)->first();
        $myprofile['frds']=FRD::where('user_id',$user_id)->get();
        return view('profile',$myprofile);
    }

}
