@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        
        <!-- Form for editing an existing post -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf <!-- CSRF token for security -->
            @method('PUT') <!-- Specify PUT method for updating -->
            @include('posts._form') <!-- Include the partial form here -->
            
            <button type="submit" class="btn btn-primary me-2">Update Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection