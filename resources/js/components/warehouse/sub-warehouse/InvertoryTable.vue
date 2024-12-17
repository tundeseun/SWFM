<template>
    <div class="p-6">
      <div class="max-w-6xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md">
        <div class="px-6 py-4 border-b border-gray-200">
          <h2 class="text-2xl font-bold">Warehouse Inventory</h2>
        </div>
        
        <!-- Search and Filter Section -->
        <div class="p-6 border-b border-gray-200 bg-gray-50">
          <div class="flex gap-4">
            <div class="flex-1">
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Search products..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>
            <div>
              <select
                v-model="shelfFilter"
                class="w-48 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              >
                <option value="">All Shelves</option>
                <option v-for="shelf in shelves" :key="shelf" :value="shelf">
                  {{ shelf }}
                </option>
              </select>
            </div>
          </div>
        </div>
  
        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  v-for="header in headers"
                  :key="header.key"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  {{ header.label }}
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="item in filteredInventory" :key="item.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ item.productName }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ item.bulkQuantity }} {{ item.bulkUnit }}</div>
                  <div class="text-sm text-gray-500">{{ item.unitQuantity }} units</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ item.shelfNumber }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ formatDate(item.lastSupplyDate) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <!-- Empty State -->
        <div v-if="filteredInventory.length === 0" class="p-6 text-center">
          <div class="text-gray-500">No inventory items found</div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  
  const searchQuery = ref('')
  const shelfFilter = ref('')
  
  // Table headers
  const headers = [
    { key: 'productName', label: 'Product Name' },
    { key: 'quantity', label: 'Quantity' },
    { key: 'shelfNumber', label: 'Shelf' },
    { key: 'lastSupplyDate', label: 'Last Supply Date' },
  ]
  
  // Sample data - replace with your actual data
  const inventory = ref([
    {
      id: 1,
      productName: 'Product A',
      bulkQuantity: 10,
      bulkUnit: 'cartons',
      unitQuantity: 100,
      shelfNumber: 'A-1',
      lastSupplyDate: '2024-01-15'
    },
    {
      id: 2,
      productName: 'Product B',
      bulkQuantity: 5,
      bulkUnit: 'cases',
      unitQuantity: 50,
      shelfNumber: 'B-2',
      lastSupplyDate: '2024-01-14'
    },
    // Add more items as needed
  ])
  
  // Sample shelves - replace with your actual shelves
  const shelves = ['A-1', 'A-2', 'B-1', 'B-2', 'C-1', 'C-2']
  
  // Filter inventory based on search query and shelf filter
  const filteredInventory = computed(() => {
    return inventory.value.filter(item => {
      const matchesSearch = item.productName.toLowerCase().includes(searchQuery.value.toLowerCase())
      const matchesShelf = !shelfFilter.value || item.shelfNumber === shelfFilter.value
      return matchesSearch && matchesShelf
    })
  })
  
  // Format date to a more readable format
  const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'short',
      day: 'numeric'
    })
  }
  </script>