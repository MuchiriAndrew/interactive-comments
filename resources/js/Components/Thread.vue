<template>
    <div class="thread flex flex-col gap-[8px]">
      <div v-for="post in posts" :key="post.id" class="main-post">
        <PostThread :post="post" />
      </div>
    </div>
  </template>
  
  <script>
  import PostThread from './PostThread.vue';
  
  export default {
    name: 'Thread',
    components: {
      PostThread,
    },
    props: {
      posts: {
        type: Array,
        required: true,
      },
    },
  };
  </script>
