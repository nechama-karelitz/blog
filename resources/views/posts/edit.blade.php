<!-- resources/views/posts/edit.blade.php -->
<h1>Edit Post</h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $post->title }}" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" required>{{ $post->content }}</textarea>

    <label for="publish_date">Publish Date:</label>
    <input type="date" id="publish_date" name="publish_date" value="{{ $post->publish_date->format('Y-m-d') }}">

    <button type="submit">Update Post</button>
</form>
