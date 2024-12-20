<template>
  <div class="flex overflow-x-hidden">
    <!-- Main Sidebar -->
    <div class="w-32 h-screen relative bg-white border-r border-gray-100 flex flex-col items-center py-6">
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
          <button
            @click="handleMenuClick(item)"
            class="w-full h-20 flex flex-col items-center justify-center gap-2 mb-4 relative"
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
          </button>

          <!-- Submenu -->
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
import { ref, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'
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
const router = useRouter()
const currentRoute = computed(() => route.path)

// Handle menu item click
const handleMenuClick = (item) => {
  if (!item.submenu) {
    router.push(item.path) // Absolute path ensures correct navigation
  }
}


const menuItems = [
  {
    label: 'Dashboard',
    icon: BarChart2,
    path: '/app/dashboard'
  },
  {
    label: 'Product',
    icon: ShoppingCart,
    path: '/app/products',
    submenu: [
      {
        label: 'Add New Product',
        icon: Plus,
        path: '/app/products/create'
      },
      {
        label: 'All Products',
        icon: List,
        path: '/app/products/all'
      }
    ]
  },
  {
    label: 'Inventory',
    icon: Package,
    path: '/app/inventory',
    submenu: [
      // {
      //   label: 'Add New Inventory',
      //   icon: Plus,
      //   path: '/app/inventory/create'
      // },
      {
        label: 'All Inventory',
        icon: List,
        path: '/app/inventory/all'
      }
    ]
  },
  {
    label: 'Shelves',
    icon: Layers,
    path: '/app/shelves',
    submenu: [
      {
        label: 'Add New Shelves',
        icon: Plus,
        path: '/app/shelves/create'
      },
      {
        label: 'All Shelves',
        icon: List,
        path: '/app/shelves/all'
      }
    ]
  },
  {
    label: 'Orders',
    icon: ClipboardList,
    path: '/app/orders',
    submenu: [
      {
        label: 'Add New Order',
        icon: Plus,
        path: '/app/orders/create'
      },
      {
        label: 'All Orders',
        icon: List,
        path: '/app/orders/all'
      }
    ]
  }
]

</script>

<style scoped>
/* Active state styling for buttons */
button.active {
  position: relative;
}

button.active::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background-color: #00ffb3;
}

/* Transition effects */
button,
.submenu-item {
  transition: all 0.3s ease;
}

/* Ensure submenu appears smoothly */
.group:hover .submenu {
  display: block;
  animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateX(-10px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
</style>