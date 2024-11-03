@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
    <div class="container">
        <h1>Create New Post</h1>
        
        <!-- Form for creating a new post -->
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            @include('posts._form') <!-- Include the partial form here -->
            
            <button type="submit" class="btn btn-primary me-2">Save Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
