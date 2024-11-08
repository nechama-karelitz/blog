<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class FetchExternalPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:external-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from an external API and save them to the database';

    /**
     * Execute the console command.
     * Fetches posts from an external API and saves new posts to the database.
     *
     * @return int Command::SUCCESS if successful, or Command::FAILURE on error.
     */
    public function handle(): int
    {
        $this->info('Fetching posts from external API...');

        // Fetch posts from the external API
        $apiUrl = env('EXTERNAL_API_URL', 'https://jsonplaceholder.typicode.com/posts');
        $response = Http::withoutVerifying()->get($apiUrl);

        if ($response->successful()) {
            $posts = $response->json();

            foreach ($posts as $post) {
                // Check if the post already exists in the database by title
                if (!Post::where('title', $post['title'])->exists()) {
                    // Save each post in the database
                    Post::create([
                        'title' => $post['title'],
                        'content' => $post['body'],
                        'publish_date' => now(), // Set current date as publish date
                    ]);
                }
            }

            $this->info('Posts fetched and saved successfully.');
        } else {
            $this->error('Failed to fetch posts from external API.');
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}