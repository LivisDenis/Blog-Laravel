<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CommentForm;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request) {
        $query = $request->input('query');
        $filter = $request->input('filter');

        $posts = $this->postService->filter($query, $filter);

//        return PostResource::collection($posts);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id) {
        $post = Post::query()->findOrFail($id);

//        return new PostResource($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function comment($id, CommentForm $request) {
        $post = Post::query()->findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route('post.show', $id));
    }
}
