<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Http\Requests\Admin\Tag\TagStoreRequest;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function categories(StoreRequest $request, Category $categories){
        $data = $request->validated();
        $categories->update($data);
        return redirect()->route('admin.category');
    }

    public function tag(TagStoreRequest $request, Tag $tags){
        $data = $request->validated();
        $tags->update($data);
        return redirect()->route('admin.colors');
    }

    public function post(PostUpdateRequest $request, Post $posts){
        $data = $request->validated();
        $posts->update($data);
        return redirect()->route('admin.post');
    }

    public function allUsers(UserStoreRequest $request, User $posts){
        $data = $request->validated();
        $posts->update($data);
        return redirect()->route('admin.users');
    }
}
