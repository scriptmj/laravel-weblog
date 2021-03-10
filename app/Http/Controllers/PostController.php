<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    function index(){
        if(Auth::user() && Auth::user()->premium){
            $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
        } else {
            $posts = Post::where('premium', false)->orderBy('created_at', 'DESC')->paginate(5);
        }
        $categories = Category::get();
        $view = View::make('weblog.index', [
            'categories' => $categories, 
            'posts' => $posts, 
            ]);
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
        if($post->premium){
            if(Auth::user()->premium()){
                return view('weblog.post', ['post' => $post]);
            } else {
                return redirect('user.premium');
            }
        } else {
            return view('weblog.post', ['post' => $post]);
        }
    }

    function addComment(Comment $comment, Post $post){
        request()->merge(['post_id' => $post->id]);
        request()->merge(['user_id' => Auth::user()->id]);
        Comment::create($this->validateComment());
        return redirect(route('post.get', [$post]));
    }

    function store(){
        request()->merge(['user_id' => Auth::user()->id]);
        $this->validateArticle();
        $post = new Post(request(['title', 'excerpt', 'body', 'user_id', 'image-file']));
        $post->premium = request()->has('premium');
        $this->validateFile();
        $post['image'] = request('image-file')->store('imagefiles');
        $post->save();
        $post->categories()->attach(request('categories'));
        return redirect(route('weblog.index'));
    }

    function written(){
        $user = Auth::user();
        return view('weblog.writtenposts', ['user' => $user]);    
    }

    function editPost(Post $post){
        $categories = Category::get();
        return view('weblog.edit', ['post' => $post, 'categories' => $categories]);
    }

    function updatePost(Post $post){
        request()->merge(['user_id' => $post->user_id]);
        if(request('image-file') !== null){
            $this->validateFile();
            $post['image'] = request('image-file')->store('imagefiles');
        }
        $post->update($this->validateArticle());
        $post->categories()->sync(request('categories'));
        return redirect(route('post.get', [$post]));
    }

    function deletePost(Post $post){
        $post->categories()->detach();
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
            'premium' => '',
        ]);
    }

    function validateFile(){
        return request()->validate([
            'image-file' => [
                'required',
                'file',
                'image',
                Rule::dimensions()->minWidth(200)->minHeight(100),
                ]
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
