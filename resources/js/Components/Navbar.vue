<template>
    <nav class="w-[97%] md:w-[70%] bg-white shadow-md py-2 px-4 flex justify-between items-center rounded-full relative">
      <div class="flex-grow"></div>
      <div class="relative" v-click-outside="() => dropdownOpen = false">
        <img
          @click="toggleDropdown"
          class="w-10 h-10 rounded-full cursor-pointer"
          src="../../../public/images/avatars/image-amyrobson.png"
          alt="User Profile"
        />
        <div v-if="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
          <ul class="py-1">
            <li>
              <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit Profile</a>
            </li>
            <li>
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
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>