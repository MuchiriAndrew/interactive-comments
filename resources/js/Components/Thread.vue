<template>
    <div class="thread flex flex-col gap-[8px] items-end justify-end">
        <!-- This is a thread -->

        <!-- main post -->
        <div class="w-full flex flex-col h-auto justify-end">
            <Post></Post>
        </div>

        <!-- replies -->
        <div class="replies w-full flex">
            <div class="w-[10%] justify-center items-center flex">
               <div style="width:2px" class="h-full bg-light-gray"></div>
            </div>
            <div class="w-[90%] flex flex-col gap-[8px] h-full">
                <Post></Post>
                <Post></Post>
                <Post></Post>
                
            </div>
        </div>
    </div>

        
</template>

<script>
import Post from './Post.vue';

export default {
    components: {
        Post,
        // Reply,
        // UserPost,
        // UserReply
        // Replying,
        // Modal,
        // Thread
    },
    name: 'Thread',
};
</script>