<?php

use App\Models\User;

function buildNestedPosts($posts, $parentId = null) {
    $nestedPosts = [];

    foreach ($posts as $post) {
        // dd($post);
        //get the user name and profile picture and place in the array
        // $post['user'] = $post->user;
        $user_id  = $post['user_id'];
        $user = User::find($user_id);
        $name = $user->name;
        $profile_picture_path = $user->profile_photo_path;

        $post['user'] = [
            'name' => $name,
            'profile_picture_path' => $profile_picture_path
        ];

        $updated_at = $post['updated_at'];
        //calculate the difference in time and set it as e.g 2 hours ago, 3 days ago, 1 month ago
        $time = Carbon\Carbon::parse($updated_at)->diffForHumans();
        $post['time'] = $time;
        // dd($time);



        if ($post['parent_post_id'] == $parentId) {
            $post['replies'] = buildNestedPosts($posts, $post['id']);
            $nestedPosts[] = $post;
        }
    }

    // dd($nestedPosts);

    return $nestedPosts;
}