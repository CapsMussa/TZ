<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function post(){

        $posts = Post::with('category')->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.page.index', compact('posts', 'categories', 'tags'));
    }
    public function category(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.page.categories', compact('categories', 'tags'));
    }
    public function tag(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.page.colors', compact('tags', 'categories'));
    }
    public function allUsers(){
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.page.users',  compact('users', 'categories', 'tags'));
    }
}
