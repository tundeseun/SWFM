<template>
  <div class="flex h-screen text-white">
    <Sidebar :is-open="sidebarOpen" @toggle-sidebar="toggleSidebar" />
    <div class="flex-1 flex flex-col overflow-auto">
      <Navbar @toggle-sidebar="toggleSidebar" />
      <DashboardContent />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import Sidebar from './Sidebar.vue'
import Navbar from './Navbar.vue'
import DashboardContent from './DashboardContent.vue'

const sidebarOpen = ref(true)

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value
}
</script>