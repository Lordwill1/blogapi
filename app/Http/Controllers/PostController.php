<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->middleware('auth:api');
        $this->postService = $postService;
    }

    public function store(PostRequest $request)
    {
        $post = $this->postService->createPost([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json($post, 201);
    }

    public function destroy($id)
    {
        return $this->postService->deletePost($id);
    }
}
