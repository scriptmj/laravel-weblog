<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function login(){
        return view('weblog.login');    
    }

    function digest(){
        return view('weblog.digest');
    }

    function unsubscribe(){
        $user = Auth::user();
        $user->digest = false;
        $user->update();
        return redirect(route('user.digest'));
    }
    
    function subscribe(){
        $user = Auth::user();
        $user->digest = true;
        $user->update();
        return redirect(route('user.digest'));
    }
}
