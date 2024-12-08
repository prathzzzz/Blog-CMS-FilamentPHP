<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create additional users
        User::factory(5)->create();

        // Create categories
        Category::factory(8)->create();

        // Create tags
        Tag::factory(15)->create();

        // Create posts with relationships
        Post::factory(50)
            ->create()
            ->each(function ($post) {
                // Attach 1-3 random categories to each post
                $post->categories()->attach(
                    Category::inRandomOrder()->take(rand(1, 3))->pluck('id')
                );

                // Attach 2-5 random tags to each post
                $post->tags()->attach(
                    Tag::inRandomOrder()->take(rand(2, 5))->pluck('id')
                );
            });
    }
}
