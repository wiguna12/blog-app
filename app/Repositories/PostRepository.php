<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::all();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function find($id)
    {
        return Post::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        return $post->delete();
    }

    public function findByUser($user_id)
    {
        return Post::where('user_id', $user_id)->get();
    }
}
