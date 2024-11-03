@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Posts</h1>

        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
        @endauth

        @if ($posts->isEmpty())
            <p>No posts available.</p>
        @else
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                        <p class="card-text"><small class="text-muted">Published on {{ $post->publish_date->format('d/m/Y') }}</small></p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link">View Post</a>
                        <!-- Show Edit and Delete buttons only if the user is authenticated -->
                        @auth
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link">Edit Post</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
