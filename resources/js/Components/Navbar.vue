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
            <li class="cursor-pointer flex items-center w-full">
              <a href="/edit-profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 font-rubik ">Edit Profile</a>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-moderate-blue" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
            </li>
            <li class="cursor-pointer flex items-center w-full">
              <a @click="handleLogout" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 font-rubik ">Logout</a>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed text-red-600" viewBox="0 0 16 16">
  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
</svg> -->
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

