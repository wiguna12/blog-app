<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function home()
    {
        // Menampilkan semua post
        $posts = $this->postService->getAllPosts();
        return view('home', compact('posts'));
    }

    public function index()
    {
        // Menampilkan hanya post yang dibuat oleh pengguna yang login
        $posts = $this->postService->getPostsByUser(Auth::id());
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Menambahkan user_id pada data post
        $this->postService->createPost($request->all(), Auth::id());
        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $this->postService->updatePost($id, $request->all());
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return redirect()->route('dashboard');
    }
}
