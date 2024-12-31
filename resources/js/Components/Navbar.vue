<template>
    <nav class="w-[97%] md:w-[90%] lg:w-[70%] bg-white shadow-md py-2 px-4 flex justify-between items-center rounded-full relative">
      <div class="flex-grow"></div>
      <div class="relative" v-click-outside="() => dropdownOpen = false">
        <img
          @click="toggleDropdown"
          class="w-10 h-10 rounded-full cursor-pointer"
          :src="profile_photo_url"
          alt="User Profile"
        />
        <div v-if="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
          <ul class="py-1">
            <li class="cursor-pointer">
              <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit Profile</a>
            </li>
            <li class="cursor-pointer">
              <a @click="handleLogout" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'Navbar',
    data() {
      return {
        dropdownOpen: false,
        props: this.$page.props,
        user: this.$page.props.auth.user,
        profile_photo_url: this.$page.props.auth.user.profile_photo_path
          ? `/storage/${this.$page.props.auth.user.profile_photo_path}`
          : '/images/avatars/default.jpg',
        
      };
    },
    methods: {
      toggleDropdown() {
        this.dropdownOpen = !this.dropdownOpen;
      },
      handleLogout() {
        this.$inertia.post('/logout');
      },
    },
    mounted() {
      // console.log(this.user);
      
    },
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>

