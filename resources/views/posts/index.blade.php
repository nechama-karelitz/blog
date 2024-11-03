<!-- resources/views/posts/index.blade.php -->

<h1>All Posts</h1>

<a href="{{ route('posts.create') }}">Create New Post</a>

@if ($posts->isEmpty())
    <p>No posts available.</p>
@else
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p><small>Published on {{ $post->publish_date->format('d/m/Y') }}</small></p>
            <a href="{{ route('posts.show', $post->id) }}">View Post</a>
            <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
        </div>
        <hr>
    @endforeach
@endif
