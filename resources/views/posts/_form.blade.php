<!-- resources/views/posts/_form.blade.php -->

@csrf

<!-- Title input -->
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" 
           value="{{ old('title', $post->title ?? '') }}" required>
</div>

<!-- Content input -->
<div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content ?? '') }}</textarea>
</div>

<!-- Publish Date input -->
<div class="mb-3">
    <label for="publish_date" class="form-label">Publish Date</label>
    <input type="date" class="form-control" id="publish_date" name="publish_date" 
           value="{{ old('publish_date', isset($post->publish_date) ? \Carbon\Carbon::parse($post->publish_date)->format('Y-m-d') : '') }}">
</div>
