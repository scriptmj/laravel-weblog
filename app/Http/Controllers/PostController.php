<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

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
        request()->merge(['post_id' => $post->id]);
        request()->merge(['user_id' => 3]);
        Comment::create($this->validateComment());
        return redirect(route('post.get', [$post]));
    }

    function store(){
        request()->merge(['user_id' => 2]);
        Post::create($this->validateArticle());
        return redirect(route('weblog.index'));
    }

    function written(User $user){
        $posts = Post::orderBy('created_at', 'DESC')->where('user_id', $user->id)->get();
        return view('weblog.writtenposts', ['posts' => $posts]);    
    }

    function editPost(Post $post){
        return view('weblog.edit', ['post' => $post]);
    }

    function updatePost(Post $post){
        request()->merge(['user_id' => $post->user_id]);
        $post->update($this->validateArticle());

        return redirect(route('post.get', [$post]));
    }

    function deletePost(Post $post){
        $post->delete();
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
