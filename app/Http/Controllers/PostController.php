<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\View;


class PostController extends Controller
{
    function index(){
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        $categories = Category::get();
        $view = View::make('weblog.index', ['categories' => $categories, 'posts' => $posts]);
        if(request()->ajax()){
            $sections = $view->renderSections();
            return $sections['content'];
        } else {
            return $view;
        }
    }

    function create(){
        $categories = Category::get();
        return view('weblog.newpost', ["categories" => $categories]);    
    }

    function get(Post $post){
        return view('weblog.post', ['post' => $post]);
    }

    function addComment(Comment $comment, Post $post){
        request()->merge(['post_id' => $post->id]);
        request()->merge(['user_id' => 3]);
        Comment::create($this->validateComment());
        return redirect(route('post.get', [$post]));
    }

    function store(){
        request()->merge(['user_id' => 2]);
        $this->validateArticle();
        $post = new Post(request(['title', 'excerpt', 'body', 'user_id', 'image-file']));
        $this->validateFile();
        $post['image'] = request('image-file')->store('imagefiles');
        $post->save();
        $post->categories()->attach(request('categories'));
        return redirect(route('weblog.index'));
    }

    function written(User $user){
        return view('weblog.writtenposts', ['user' => $user]);    
    }

    function editPost(Post $post){
        $categories = Category::get();
        return view('weblog.edit', ['post' => $post, 'categories' => $categories]);
    }

    function updatePost(Post $post){
        request()->merge(['user_id' => $post->user_id]);
        $post->update($this->validateArticle());
        $post->categories()->sync(request('categories'));
        if(request('image-file') !== null){
            $this->validateFile(); //TODO DOESN'T VALIDATE
        }
        //TODO Old categories are still added through JS and can be added double
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
            'categories' => 'exists:categories,id',
        ]);
    }

    function validateFile(){
        return request()->validate([
            'image-file' => 'required|file',
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
