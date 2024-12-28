<template>
  <div class="flex h-screen text-white">
    <Sidebar v-if="!isOnDashboardRoute" :is-open="sidebarOpen" :isVisible="isSidebarVisible" />
    <div class="flex-1 flex flex-col">
      <div class="">
        <Navbar v-if="!isOnDashboardRoute" :is-open="sidebarOpen" :isVisible="isSidebarVisible" />
      </div>

      <div class="relative flex-1">
        <router-view v-slot="{ Component }">
          <Transition name="fade" mode="out-in">
            <Loader v-if="isLoading" />
            <component :is="Component" :key="$route.path" v-else />
          </Transition>
        </router-view>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import Navbar from '@/components/Navbar.vue';
import Sidebar from '@/components/Sidebar.vue';
import Loader from '../components/Loader.vue';

export default {
  components: {
    Navbar,
    Sidebar,
    Loader
  },

  data() {
    return {
      sidebarOpen: true,
      isLoading: false,
      isSidebarVisible: true
    }
  },

  created() {
    this.setupNavigationGuard();
  },

  methods: {
    setupNavigationGuard() {
      this.removeGuard = this.$router.beforeEach((to, from, next) => {
        this.isLoading = true;
        setTimeout(() => {
          this.isLoading = false;
          next();
        }, 1000);
      });
    },

    toggleSidebar() {
      this.sidebarOpen = !this.sidebarOpen;
    }
  },

  computed: {
    isOnDashboardRoute() {
      return this.$route.name === 'Dashboard';
    }
  },

  beforeDestroy() {
    // Clean up the navigation guard
    if (this.removeGuard) {
      this.removeGuard();
    }
  }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>