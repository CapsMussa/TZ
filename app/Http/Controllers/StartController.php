<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Post\PostFilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Start;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index2(PostFilterRequest $request)
    {
        $data = $request->validated();
        $query = Post::query();
        $categories_idx = Category::all();

        if(isset($data['category_id'])){
            $query->where('category_id','like', "%{$data['category_id']}%");
        }
        if(isset($data['name'])){
            $query->where('name','like', "%{$data['name']}%");
        }
        $posts = $query->get();
        return view('index2', compact('posts', 'categories_idx'));
    }


}
