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
                'content' => 'This is the first post content. It is about 30 words long and provides some initial information.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => null,
                'content' => 'Here is another post content. It also contains around 30 words and gives some additional details.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => null,
                'content' => 'This post is written by a different user. It has about 30 words and shares some unique insights.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 1,
                'content' => 'This is a reply to the first post. It continues the discussion and adds more context to the topic.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 1,
                'content' => 'Another reply to the first post. This one provides a different perspective and further elaborates on the subject.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'user_id' => 1,
                'parent_post_id' => 3,
                'content' => 'Replying to the third post, this content provides additional insights and continues the conversation.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 4,
                'content' => 'This is a reply to the reply of the first post. It adds more depth to the discussion and shares new ideas.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 5,
                'content' => 'Another reply to the reply of the first post. This one offers a different viewpoint and expands on the topic.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 6,
                'content' => 'Replying to the reply of the second post, this content provides further clarification and additional information.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 7,
                'content' => 'This is a reply to the reply of the third post. It continues the conversation and adds more context.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 8,
                'content' => 'Another reply to the reply of the reply of the first post. This one provides new insights and elaborates on the topic.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'parent_post_id' => 9,
                'content' => 'Replying to the reply of the reply of the first post, this content adds more depth to the discussion.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'parent_post_id' => 10,
                'content' => 'This is a reply to the reply of the reply of the second post. It provides additional information and context.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'parent_post_id' => 11,
                'content' => 'Another reply to the reply of the reply of the third post. This one offers a different perspective and expands on the topic.',
                'upvotes' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}