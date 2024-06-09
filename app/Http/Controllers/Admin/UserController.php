<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.page.users',  compact('users', 'categories', 'tags'));
    }

    public function delete($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.users');
    }

    public function edit($id){
        $users = User::find($id);
        return view('admin.page.edit.users', compact('users'));
    }

    public function update(UserStoreRequest $request, User $user){
        $users = $request->validated();
        $user->update($users);
        return redirect()->route('admin.users');
    }

}
