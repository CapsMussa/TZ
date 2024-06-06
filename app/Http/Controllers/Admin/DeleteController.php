<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function categories($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category');

    }


    public function tag($id){
        $tags = Tag::find($id);
        $tags->delete();
        return redirect()->route('admin.colors');
    }

    public function post($id){
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('admin.index');
    }

    public function allUsers($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.users');
    }
}
