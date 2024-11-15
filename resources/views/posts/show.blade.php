@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-2">{{ $post->title }}</h4>
            <h6 class="card-subtitle mb-2 text-muted">
                <span class="fw-normal">Published by</span>
                <span class="text-dark">{{ $post->user->name }}</span>
                <span class="fw-normal">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
            </h6>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
@endsection
