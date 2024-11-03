@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{!! nl2br(e($post->content)) !!}</p>
        <p><small class="text-muted">Published on {{ $post->publish_date->format('d/m/Y') }}</small></p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
    </div>
@endsection
