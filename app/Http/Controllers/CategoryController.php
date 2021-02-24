<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\View;


class CategoryController extends Controller
{
    public function get(){
        return Category::get();
    }

    public function create(){
        return Category::create($this->validateCategory());
    }

    public function destroy(Category $category){
        $category->destroy();
    }

    public function getPostsByCategory(Category $category){
    
        $view = View::make('weblog.postsbycategory', ['category' => $category, 'posts' => $category->posts]);
        if(request()->ajax()){
            $sections = $view->renderSections();
            return $sections['content'];
        }

        // return view('weblog.postsbycategory', [
        //     'posts' => $category->posts,
        //     'category' => $category,
        // ]);
    }

    function validateCategory(){
        return request()->validate([
            'name' => 'required|string|min:1',
        ]);
    }
}
