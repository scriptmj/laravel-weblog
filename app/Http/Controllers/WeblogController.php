<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grocery;

class WeblogController extends Controller{
    function index(){
        return view('weblog.index');
    }

    function create(){
        return view('weblog.newpost');    
    }

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