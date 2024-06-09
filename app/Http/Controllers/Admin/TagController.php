<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Http\Requests\Admin\Tag\TagStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.page.colors', compact('tags', 'categories'));
    }


    public function delete($id){
        $tags = Tag::find($id);
        $tags->delete();
        return redirect()->route('admin.colors');
    }

    public function edit($id){
        $data = Tag::find($id);
        return view('admin.page.edit.tag', compact('data'));
    }

    public function store(TagStoreRequest $request){
        $date = $request->validated();
        Tag::firstOrcreate($date);
        return redirect()->route('admin.colors');
    }

    public function update(TagStoreRequest $request, Tag $tags){
        $data = $request->validated();
        $tags->update($data);
        return redirect()->route('admin.colors');
    }

}
