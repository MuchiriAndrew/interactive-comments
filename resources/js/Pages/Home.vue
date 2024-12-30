<template>
    <div class="flex justify-center items-start h-screen pt-10">
        <Modal v-if="isDeleting" @close="toggleModal"></Modal>

        <!-- <p class="text-2xl text-bold text-red-400">Welcome to Inertia.js with Vue and Tailwind CSS!</p> -->

        <div class="flex flex-col justify-center items-end gap-4 w-full px-3 md:w-[70%] bg-yellow-300">
            <Post></Post>
            <UserPost @delete="toggleModal"></UserPost>
            <Replying></Replying>
        </div>
    </div>
</template>

<script>

import Post from '../Components/Post.vue';
import UserPost from '../Components/UserPost.vue';
import Replying from '../Components/Replying.vue';
import Modal from '../Components/Modal.vue';


export default {
    components: {
        Post,
        // Reply,
        UserPost,
        // UserReply
        Replying,
        Modal
    },

    data() {
        return {
            isDeleting: false,
        }
    },

    methods: {
        toggleModal() {
            this.isDeleting = !this.isDeleting;
        }
    },
};

</script>