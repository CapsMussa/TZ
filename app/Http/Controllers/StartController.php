<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Post\PostFilterRequest;
use App\Models\Category;
use App\Models\Post;

class StartController extends Controller
{
    public function index(PostFilterRequest $request)
    {
        $data = $request->validated();
        $query = Post::query();
        $categories_idx = Category::all();

        if (isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        }
        if (isset($data['name'])) {
            $query->where('name', 'like', "%{$data['name']}%");
        }
        $posts = $query->get();
        return view('index', compact('posts', 'categories_idx'));
    }


}
