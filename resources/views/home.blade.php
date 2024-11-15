@extends('layouts.app')

@section('content')
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
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark btn-sm">Read More <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
