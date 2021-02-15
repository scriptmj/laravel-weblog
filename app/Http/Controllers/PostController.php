<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    function index(){
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        return view('weblog.index', ['posts' => $posts]);
    }

    function create(){
        return view('weblog.newpost');    
    }

    function get(Post $post){
        $comments = Comment::where('post_id', $post->id)->get();
        return view('weblog.post', ['post' => $post, 'comments' => $comments]);
    }

    function addComment(Comment $comment, Post $post){
        //dd($this->validateComment());
        Comment::create($this->validateComment());
        return redirect(route('post.get', [$post]));
    }

    function store(){
        //dd($this->validateArticle());
        Post::create($this->validateArticle());
        return redirect(route('weblog.index'));
    }

    function validateArticle(){
        return request()->validate([
            'title' => 'required|string|min:2',
            'excerpt' => 'required|string|min:2',
            'body' => 'required|string|min:2',
            'user_id' => 'required|integer',
        ]);
    }

    function validateComment(){
        return request()->validate([
            'body' => 'required|string|min:2',
            'post_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
    }
}
