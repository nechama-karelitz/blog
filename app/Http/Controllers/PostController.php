<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * PostController constructor.
     * Applies authentication middleware to restrict access to certain actions.
     */
    public function __construct()
    {
        // Only authenticated users can create, edit, and delete posts
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     * Shows all posts on the main posts page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all posts
        $posts = Post::all();

        // Return the 'index' view with the list of posts
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * Displays the view for adding a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the 'create' view for adding a new post
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * Validates and saves a new post to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation: Ensures that required fields are provided and in correct format
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'nullable|date',
        ]);

        // Create a new post and save it to the database
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publish_date' => $request->input('publish_date'),
        ]);

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     * Shows a single post on its own page.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        // Return the 'show' view for a single post
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * Displays the view for editing a post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        // Return the 'edit' view for a single post
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * Validates and updates the post in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        // Validation: Ensure the fields are valid
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'nullable|date',
        ]);

        // Update the post with the new data
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publish_date' => $request->input('publish_date'),
        ]);

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * Deletes the post from the database.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        // Delete the post from the database
        $post->delete();

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}