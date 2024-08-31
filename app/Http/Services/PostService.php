<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
