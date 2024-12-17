<template>
    <header class="bg-white p-4 py-8 pb-7 flex items-center justify-between border-b border-gray-100">
      <button @click="$emit('toggle-sidebar')" class="">
        <MenuIcon class="h-8 w-8 text-gray-500" />
      </button>
      <div class="flex items-center space-x-10">
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
  
  defineEmits(['toggle-sidebar'])
  </script>