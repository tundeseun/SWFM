<template>
  <div 
  class="w-64 bg-white min-h-screen flex flex-col justify-between p-4 border-r border-gray-100">
    <!-- Top Section -->
    <div>
      <!-- Logo/Profile Section -->
      <div class="mb-8 flex items-center gap-3">
        <img src="../assets/image/logo.png" alt="Logo" class="w-10 h-10"/>
      </div>

      <!-- Main Navigation -->
      <nav class="space-y-2">
        <!-- Dashboard -->
        <router-link 
          to="/app/dashboard" 
          class="text-black py-4 pl-3 flex mb-10 items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition-colors"
          :class="{ 'bg-primary py-4 pl-3 text-black font-semibold': currentRoute === '/app/dashboard' }"
        >
          <BarChartIcon class="w-6 h-6 text-black font-semibold" />
          <span class="text-sm font-medium">Dashboard</span>
        </router-link>

        <!-- Warehouse Section -->
        <div>
          <button 
            @click="toggleWarehouse" 
            type="button" 
            class="w-full flex items-center justify-between p-2 rounded-lg text-gray-600 transition-colors"
            :class="{ 'text-primary': isWarehouseOpen }"
          >
            <div class="flex items-center gap-3">
              <BaggageClaim class="w-5 h-5 text-black" />
              <span class="text-sm text-black font-medium">Warehouse</span>
            </div>
            <ChevronDown 
              class="w-4 h-4 text-black transition-transform duration-200"
              :class="{ 'rotate-180': isWarehouseOpen }"
            />
          </button>

          <!-- Warehouse Submenu -->
          <div 
            v-show="isWarehouseOpen" 
            class="mt-1 ml-7 pl-4 border-l border-gray-100 space-y-1"
          >
            <router-link 
              v-for="item in warehouseItems" 
              :key="item.name"
              :to="item.href"
              class="flex items-center gap-3 p-2 rounded-lg text-gray-600 text-sm"
              :class="{ 'text-primary': currentRoute === item.href }"
            >
              <component :is="item.icon" class="w-4 h-4 text-black" />
              <span class="text-black">{{ item.name }}</span>
            </router-link>
          </div>
        </div>
      </nav>
    </div>

    <!-- Bottom Section -->
    <div class="space-y-2">
      <!-- Help Center -->
      <router-link 
        to="/help"
        class="flex items-center gap-3 p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
      >
        <HelpCircle class="w-5 h-5" />
        <span class="text-sm font-medium">Help Center</span>
      </router-link>

      <!-- Logout -->
      <button 
        @click="handleLogout" 
        class="w-full flex items-center gap-3 p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
      >
        <LogOut class="w-5 h-5" />
        <span class="text-sm font-medium">Log Out</span>
      </button>

    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import { 
  BarChart,
  BaggageClaim,
  ChevronDown,
  ShoppingCart,
  Layers,
  Target,
  Cuboid,
  HelpCircle,
  LogOut,
  BarChartIcon,
  Moon
} from 'lucide-vue-next'
import { Switch } from '@headlessui/vue'

const route = useRoute()
const currentRoute = computed(() => route.path)
const isWarehouseOpen = ref(false)
const isDarkMode = ref(false)

// Sidebar state (for small screens)
const isSidebarOpen = ref(false)

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value
}

const toggleWarehouse = () => {
  isWarehouseOpen.value = !isWarehouseOpen.value
}



const handleLogout = () => {
  // Implement logout logic here
  console.log('Logging out...')
}

const warehouseItems = [
  { name: 'Create Product', icon: ShoppingCart, href: '/app/create-product' },
  { name: 'Inventory', icon: Target, href: '/app/inventory-table' },
  { name: 'Shelves', icon: Layers, href: '/app/create-shelf' },
  { name: 'Purchase Orders', icon: Cuboid, href: '/app/purchase-order' },
]
</script>

<style scoped>
:root {
  --primary: #6366f1;
}

.text-primary {
  color: var(--primary);
}

.bg-primary\/10 {
  background-color: rgb(99 102 241 / 0.1);
}
</style>