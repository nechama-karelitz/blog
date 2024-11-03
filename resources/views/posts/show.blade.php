<!-- resources/views/posts/show.blade.php -->
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p><small>Published on {{ $post->publish_date->format('d/m/Y') }}</small></p>

<a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>

<form method="POST" action="{{ route('posts.destroy', $post->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Post</button>
</form>
