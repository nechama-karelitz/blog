<!-- resources/views/posts/create.blade.php -->
<h1>Create New Post</h1>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" required></textarea>

    <label for="publish_date">Publish Date:</label>
    <input type="date" id="publish_date" name="publish_date">

    <button type="submit">Create Post</button>
</form>
