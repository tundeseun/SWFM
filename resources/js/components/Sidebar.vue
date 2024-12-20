<template>
  <!-- Added overflow-x-hidden to prevent horizontal scrolling -->
  <div class="flex overflow-x-hidden relative">
    <!-- Main Sidebar -->
    <div class="w-32 min-h-screen bg-white border-r border-gray-100 flex flex-col items-center py-6">
      <nav class="flex-1 w-full">
        <!-- Logo Section -->
        <div class="mb-8 flex items-center justify-center gap-3">       
          <img src="../assets/image/logo.png" alt="Logo" class="w-10 h-10"/>
        </div>

        <!-- Menu Items -->
        <div 
          v-for="(item, index) in menuItems" 
          :key="index"
          class="relative group"
        >
          <router-link
            :to="item.path"
            class="h-20 flex flex-col items-center justify-center gap-2 mb-4 relative"
            :class="[
              currentRoute === item.path ? 'text-[#00ffb3]' : 'text-gray-500',
              'hover:text-[#00ffb3] transition-colors duration-200'
            ]"
          >
            <component 
              :is="item.icon" 
              class="w-8 h-8 font-sm"
              :class="{'text-[#00ffb3]': currentRoute === item.path}"
            />
            <span class="text-xs font-medium">{{ item.label }}</span>
          </router-link>

          <!-- Submenu - Fixed positioning relative to viewport -->
          <div
            v-if="item.submenu"
            class="fixed left-32 z-[100] top-0 pt-[60px] h-screen w-64 hidden group-hover:block bg-white border-r border-gray-100 shadow-lg"
            style="margin-left: 0;"
          >
            <div class="pt-12">
              <router-link
                v-for="(subItem, subIndex) in item.submenu"
                :key="subIndex"
                :to="subItem.path"
                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 text-gray-700 text-sm"
              >
                <component :is="subItem.icon" class="w-4 h-4" />
                <span>{{ subItem.label }}</span>
              </router-link>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</template>

<script setup>
// Script remains the same as your original code
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import {
  BarChart2,
  ShoppingCart,
  Target,
  Layers,
  ClipboardList,
  Plus,
  List,
  Package,
  BoxIcon,
  FileText
} from 'lucide-vue-next'

const route = useRoute()
const currentRoute = computed(() => route.path)

const menuItems = [
  {
    label: 'Dashboard',
    icon: BarChart2,
    path: '/dashboard'
  },
  {
    label: 'Product',
    icon: ShoppingCart,
    path: '/products',
    submenu: [
      {
        label: 'Add New Product',
        icon: Plus,
        path: 'app/products/create'
      },
      {
        label: 'All Products',
        icon: List,
        path: '/products/all'
      }
    ]
  },
  {
    label: 'Inventory',
    icon: Package,
    path: '/inventory-table',
    submenu: [
      {
        label: 'Add New Inventory',
        icon: Plus,
        path: '/inventory/create'
      },
      {
        label: 'All Inventory',
        icon: List,
        path: '/inventory/all'
      }
    ]
  },
  {
    label: 'Shelves',
    icon: Layers,
    path: '/shelves',
    submenu: [
      {
        label: 'Add New Shelves',
        icon: Plus,
        path: '/shelves/create'
      },
      {
        label: 'All Shelves',
        icon: List,
        path: '/shelves/all'
      }
    ]
  },
  {
    label: 'Orders',
    icon: ClipboardList,
    path: '/orders',
    submenu: [
      {
        label: 'Add New Order',
        icon: Plus,
        path: '/orders/create'
      },
      {
        label: 'All Orders',
        icon: List,
        path: '/orders/all'
      }
    ]
  }
]
</script>

<style scoped>
.router-link-active {
  position: relative;
}

.router-link-active::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background-color: #00ffb3;
}

.router-link-active,
.router-link-active component {
  transition: all 0.3s ease;
}
</style>