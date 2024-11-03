@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $post->title }}</h1>
        <p>{!! nl2br(e($post->content)) !!}</p>
        <p class="mt-4">
            <small class="text-muted">
                Published on {{ $post->publish_date ? $post->publish_date->format('d/m/Y') : 'Date not available' }}
            </small>
        </p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
    </div>
@endsection
