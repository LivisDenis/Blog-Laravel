<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class IndexController extends Controller
{
    public function index() {

        $posts = Post::query()->orderBy('created_at', 'DESC')->limit(8)->get();

        if (auth('admin')->check()) {
            return redirect(route('admin.posts.index'));
        }

//      return PostResource::collection($posts);
        return view('welcome', [
            'posts' => $posts
        ]);
    }
}
