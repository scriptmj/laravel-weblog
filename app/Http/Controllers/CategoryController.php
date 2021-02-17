<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get(){
        return Category::get();
    }

    public function create(){
        Category::create($this->validateCategory);
    }

    public function destroy(Category $category){
        $category->destroy();
    }

    public function validateCategory(){
        return request()->validate([
            'name' => 'required|string|min:1',
        ]);
    }
}
