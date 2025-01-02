<template>
    <header class="fixed top-0 z-[180] w-full bg-white p-4 py-8 pb-7 flex items-center justify-between border-b border-gray-100">
      <button @click="$emit('toggle-sidebar')" class="relative ">
      <MenuIcon class="h-8 w-8 text-gray-500" />
    </button>


      <div class="flex items-center space-x-10">
        <div class="">
      <router-link 
        class="border-primary border-[1px] rounded-[20px] px-6 py-2"
        to="/app/pos"
      >
      <span class="text-black ml-1">POS</span>
      </router-link>
      <!-- Full screen toggle -->
      <i class="i-Full-Screen header-icon d-none d-sm-inline-block" @click="handleFullScreen"></i>
      <!-- Grid menu Dropdown -->

    </div>
        <button class="relative">
          <BellIcon class="h-6 w-6 text-gray-500" />
          <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
        </button>
        <div class="flex items-center space-x-2">
          <CircleUserRound class="h-6 w-6 text-gray-500"/>
          <span>John Doe</span>
        </div>
      </div>
    </header>
  </template>
  
  <script setup>
  import { BellIcon, MenuIcon, CircleUserRound } from 'lucide-vue-next'
  
//   const isSidebarOpen = ref(false);

// const toggleSidebar = () => {
//   isSidebarOpen.value = !isSidebarOpen.value;
// };

// defineExpose({
//   isSidebarOpen,
//   toggleSidebar,
// });


defineEmits(['toggle-sidebar']);


</script>