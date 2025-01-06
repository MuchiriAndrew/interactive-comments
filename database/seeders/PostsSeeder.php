<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'parent_post_id' => null,
                'content' => 'This post discusses the importance of understanding HTML and CSS for building the structure and styling of modern websites.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => null,
                'content' => 'JavaScript is a crucial technology for creating dynamic and interactive web pages. This post covers its fundamentals.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => null,
                'content' => 'This post introduces frameworks like React and Vue.js and how they simplify building user interfaces.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 1,
                'content' => 'Replying to the first post: Understanding the DOM is critical when working with HTML and CSS for better web structure.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 1,
                'content' => 'Another reply to the first post: CSS frameworks like Bootstrap are very useful for rapid styling and prototyping.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 2,
                'content' => 'This reply emphasizes the importance of learning JavaScript ES6 features like arrow functions and promises.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 3,
                'content' => 'Replying to the third post: Frameworks like Angular are also powerful for building complex frontend applications.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 4,
                'content' => 'Reply to the first reply: Flexbox and CSS Grid are game changers for modern web layouts.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 5,
                'content' => 'Another reply: Tailwind CSS is gaining popularity for its utility-first approach to styling.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 6,
                'content' => 'Reply to the JavaScript post: Async/Await syntax is essential for managing asynchronous operations efficiently.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 7,
                'content' => 'Replying to the reply about frameworks: Vue.js has a gentle learning curve, making it ideal for beginners.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 8,
                'content' => 'Another reply: Advanced CSS techniques, like using pseudo-elements, enhance the visual appeal of web designs.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 9,
                'content' => 'Replying again: Combining CSS and JavaScript for animations can create engaging user experiences.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 10,
                'content' => 'This reply discusses the importance of testing frameworks like Jest for ensuring JavaScript code reliability.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 11,
                'content' => 'Another reply: Accessibility is crucial in frontend development to make web apps usable for everyone.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}