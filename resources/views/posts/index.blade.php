@extends('layouts.app')

@section('content')
    <div class="d-flex flex-col justify-content-between mb-4">
        <h2 class="mb-0">Dashboard</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> Add New Post</a>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{ $post->title }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <span class="fw-normal">Published by</span>
                            <span class="text-dark">{{ $post->user->name }}</span>
                            <span class="fw-normal">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                        </h6>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 50, '...') }}</p>
                        <div class="d-flex">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-eye"></i> Show</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning mx-2"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-trash"></i>
                                    Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
