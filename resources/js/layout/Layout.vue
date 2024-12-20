<template>
    <div class="flex h-screen text-white">
      <Sidebar v-if="!isOnDashboardRoute" :is-open="sidebarOpen" :isVisible="isSidebarVisible" />
      <div class="flex-1 flex flex-col overflow-auto">
        <Navbar v-if="!isOnDashboardRoute" :is-open="sidebarOpen" :isVisible="isSidebarVisible" />
        <div class="pt-32">
            <router-view />
        </div>
      </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import Navbar from '@/components/Navbar.vue'
import Sidebar from '@/components/Sidebar.vue'

const isSidebarVisible = ref(true);

export default {
  components: {
    Navbar,
    Sidebar
  },
  data() {
    return {
      sidebarOpen: true
    }
  },
  computed: {
    isOnDashboardRoute() {
      return this.$route.name === 'Dashboard'
    }
  },
  methods: {
    toggleSidebar() {
      this.sidebarOpen = !this.sidebarOpen
    }
  }
}
</script>