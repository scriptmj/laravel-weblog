<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(){
        return view('weblog.login');    
    }

    function premium(){
        return view('weblog.premiumsignon');    
    }

    function written(){
        return view('weblog.writtenposts');    
    }
}
