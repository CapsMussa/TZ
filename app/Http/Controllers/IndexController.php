<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Post\PostFilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('index2');
    }

    public function postsFilters(){
        $categories = Category::all();
        return view('layouts.app', compact( 'categories'));
    }
}
