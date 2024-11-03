<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * PostController constructor.
     * Applies authentication middleware to restrict access to certain actions.
     * Only authenticated users can create, edit, and delete posts.
     */
    public function __construct()
    {
        // Apply authentication middleware, except for index and show actions
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of all posts.
     * Shows all posts on the main posts page.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        // Retrieve all posts from the database
        $posts = Post::all();

        // Return the 'index' view with the list of posts
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     * Displays the view for adding a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        // Return the 'create' view for adding a new post
        return view('posts.create');
    }

    /**
     * Store a newly created post in the database.
     * Validates input data and saves a new post to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'nullable|date',
        ]);

        // Set default value for publish_date if it's null
        $data = $request->all();
        $data['publish_date'] = $data['publish_date'] ?? now();

        // Create and save a new post in the database
        Post::create($data);

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display a specific post.
     * Shows the details of a single post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post): \Illuminate\View\View
    {
        // Return the 'show' view for a single post with its details
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     * Displays the view for editing an existing post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post): \Illuminate\View\View
    {
        // Return the 'edit' view with the post's current data for editing
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in the database.
     * Validates input data and updates the post in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        // Validate incoming request data for update
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'nullable|date',
        ]);

        // Set default value for publish_date if it's null
        $data = $request->all();
        $data['publish_date'] = $data['publish_date'] ?? now();

        // Update the post with new data
        $post->update($data);

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from the database.
     * Deletes the post and redirects to the list of posts.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        // Delete the specified post from the database
        $post->delete();

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}