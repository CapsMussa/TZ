<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Http\Requests\Admin\Tag\TagStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.page.categories', compact('categories', 'tags'));
    }


    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category');
    }


    public function edit($id){
        $data = Category::find($id);
        return view('admin.page.edit.category', compact('data'));
    }


    public function store(StoreRequest $request){
        $date = $request->validated();
        Category::firstOrcreate($date);
        return redirect()->route('admin.category');
    }



    public function update(StoreRequest $request, Category $categories){
        $data = $request->validated();
        $categories->update($data);
        return redirect()->route('admin.category');
    }

}
