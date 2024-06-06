<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Tag\TagStoreRequest;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function categories(StoreRequest $request){
        $date = $request->validated();
        Category::firstOrcreate($date);
        return redirect()->route('admin.category');
    }


    public function tag(TagStoreRequest $request){
        $date = $request->validated();
        Tag::firstOrcreate($date);
        return redirect()->route('admin.colors');
    }

    public function post(PostStoreRequest $request){
        $date = $request->validated();
        $date['src'] = Storage::disk('public')->put('/images', $date['src']);

        Post::firstOrcreate($date);
        return redirect()->route('admin.index', compact('date'));
    }


    public function allUser(UserStoreRequest $request){
        $date = $request->validated();
        User::firstOrcreate($date);
        return redirect()->route('admin.users');
    }
}
