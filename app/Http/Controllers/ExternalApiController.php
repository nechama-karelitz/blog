<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ExternalApiController extends Controller
{
    public function fetchPosts()
    {
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/posts');
        
        if ($response->successful()) {
            $posts = $response->json();
            return view('external_posts', ['posts' => $posts]);
        } else {
            return view('external_posts', ['error' => 'Failed to fetch posts']);
        }
    }
}
