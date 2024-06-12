<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.page.index', compact('posts', 'categories', 'tags'));
    }

    public function delete($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        return view('admin.page.edit.post', compact('data'));
    }

    public function store(PostStoreRequest $request)
    {
        $date = $request->validated();
        $date['src'] = Storage::disk('public')->put('', $date['src']);

        Post::firstOrCreate($date);

        $reviewPath =  Image::make('storage/'.$date['src'])->fit(200,200);
        $date['src'] = $reviewPath->save('storage/pre_'.$date['src']);


        return redirect()->route('admin.index', compact('date'));
    }

    public function update(PostUpdateRequest $request, Post $posts)
    {
        $data = $request->validated();
        $data['src'] = Storage::disk('public')->put('/images', $data['src']);
        $posts->update($data);
        return redirect()->route('admin.index');
    }

}
