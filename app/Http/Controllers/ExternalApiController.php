<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ExternalApiController extends Controller
{
    /**
     * Fetch posts from an external API and display them in a view.
     *
     * @return \Illuminate\View\View
     */
    public function fetchPosts()
    {
        // Retrieve the API URL from the .env file
        $apiUrl = env('EXTERNAL_API_URL', 'https://jsonplaceholder.typicode.com/posts');

        // Send a GET request to the external API
        $response = Http::withoutVerifying()->get($apiUrl);
        
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response into an array
            $posts = $response->json();

            // Return the view with the fetched posts
            return view('external_posts', ['posts' => $posts]);
        } else {
            // If the request failed, log the error and display an error message in the view
            \Log::error('Failed to fetch posts from external API', ['url' => $apiUrl]);

            return view('external_posts', ['error' => 'Failed to fetch posts']);
        }
    }
}