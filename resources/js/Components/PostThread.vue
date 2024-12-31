<template>
    <div 
    class="thread flex flex-col gap-[8px] items-end justify-end">
        <!-- This is a thread -->

        <!-- main post -->
        <div 
        class="w-full flex flex-col h-auto justify-end">
            <Post :post="post" />
        </div>

        <div 
        v-if="hasReplies(post)"
        v-for="reply in post.replies"
        class="replies w-full flex justify-end">

            <div v-if="!isMainPost(post)" class="w-[10%] justify-center items-center flex">
               <div style="width:2px" class="h-full pb-5 bg-light-gray"></div>
            </div>

            <div class="min-w-[540px] w-[90%] flex flex-col gap-[8px] h-full">
                <!-- <Post>{{ reply.content }}</Post>                 -->
                <PostThread :post="reply" />
                
                
            </div>
        </div>
        

    </div>

        
</template>

<script>
import Post from './Post.vue';
// import PostThread from './PostThread.vue';

export default {
    components: {
        Post,
        // PostThread
    },
    name: 'Thread',
    props: {
        post: {
            type: Object,
            required: true
        }
    },

    // data() {
    //     return {
    //         fetchedposts: this.$page.props.posts,
    //     }
    // },

    methods: {
        isMainPost(post) {
            //check if the parent post id is null, if it is it is a main post
            return post.parent_post_id === null;
        },

        isReply(post) {
            //check if the parent post id is not null, if it is it is a reply
            return post.parent_post_id !== null;
        },

        hasReplies(post) {
            //check if the post has replies
            return post.replies.length > 0;
        }
    },

    mounted() {
        console.log(this.posts);
    }
};
</script>