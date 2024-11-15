@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <h3>Create New Post</h3>
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="15" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
