@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">External Posts</h1>

        @if(isset($error))
            <p>{{ $error }}</p>
        @else
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
