<template>
    <div class="flex flex-col last:justify-center items-center min-h-screen pt-10 gap-[8px]">
      <Modal v-if="isDeleting" @close="toggleModal"></Modal>
      <Navbar class="mb-10"></Navbar>
      
      <!-- <p class="text-2xl text-bold text-red-400">Welcome to Inertia.js with Vue and Tailwind CSS!</p> -->
      
      <div class="flex flex-col justify-center items-end gap-4 w-full px-3 md:w-auto">
        <Post></Post>
        <UserPost @delete="toggleModal"></UserPost>     
        <Thread></Thread>
      </div>
  
      <Replying></Replying>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue'
  import { usePage } from '@inertiajs/vue3'
  import { useToast } from 'vue-toastification'
  
  import Post from '../Components/Post.vue'
  import UserPost from '../Components/UserPost.vue'
  import Replying from '../Components/Replying.vue'
  import Modal from '../Components/Modal.vue'
  import Thread from '../Components/Thread.vue'
  import Navbar from '../Components/Navbar.vue'
  
  const toast = useToast()
  
  const { props } = usePage()
  const flash = props.flash
  
  if (flash.success) {
    toast.success(flash.success)
  }
  
  const isDeleting = reactive(false)
  
  function toggleModal() {
    isDeleting.value = !isDeleting.value
  }
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>