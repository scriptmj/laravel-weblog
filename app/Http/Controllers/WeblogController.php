<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class WeblogController extends Controller{
    function index(){
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        return view('weblog.index', ['posts' => $posts]);
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