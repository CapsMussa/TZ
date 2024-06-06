<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Post\PostFilterRequest;
use App\Models\Post;
use App\Models\Start;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(PostFilterRequest $request)
    {

        $data = $request->validated();
        $query = Post::query();
        if(isset($data['name'])){
            $query->where('name','like', "%{$data['name']}%");
        }
        $posts = $query->get();

        return view('index', compact('posts'));
    }

}
