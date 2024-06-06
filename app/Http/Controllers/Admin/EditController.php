<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function categories($id){
        $data = Category::find($id);
        return view('admin.page.edit.category', compact('data'));
    }

    public function tag($id){
        $data = Tag::find($id);
        return view('admin.page.edit.tag', compact('data'));
    }

    public function post($id){
        $data = Post::find($id);
        return view('admin.page.edit.post', compact('data'));
    }

    public function allUsers($id){
        $data = User::find($id);
        return view('admin.page.edit.user', compact('data'));
    }
}
