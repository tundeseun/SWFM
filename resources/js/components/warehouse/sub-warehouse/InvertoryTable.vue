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
              class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
          <div>
            <select
              v-model="shelfFilter"
              class="w-48 px-3 py-2 text-black border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
import { ref, computed, onMounted } from 'vue'
import axios from 'axios'

// Reactive state
const searchQuery = ref('')
const shelfFilter = ref('')
const inventory = ref([])  // Will hold the fetched inventory data
const shelves = ref([])  // Will hold available shelves (you can fetch these as well)

// Table headers
const headers = [
  { key: 'productName', label: 'Product Name' },
  { key: 'quantity', label: 'Quantity' },
  { key: 'shelfNumber', label: 'Shelf' },
  { key: 'lastSupplyDate', label: 'Last Supply Date' },
]

// Fetch data from the API
const fetchInventory = async () => {
  try {
    const response = await axios.get('/inventory', {
      headers: {
        'Authorization': 'Bearer eyJpdiI6IkdJU0FPRmk3OGxWNWtDbWYzRzdTRUE9PSIsInZhbHVlIjoiZmYxcDM4Zlg4aTIxbVIya0hldXEwTWs2S28xVUZ0Z0g4WlJhbExWaUZsbndGMGFtaDIxM0REY244Z1hDNTFrNWtaSGpWL0hQbEFsN3laYWU1dWx0OUZtb29BN2NGZEtnYjhJVU0ycWRnUG5EUkc2elB6WHREd1lFc21NQnJhWnMiLCJtYWMiOiJiZWU2ODI5NzNhMjIwYzgyZGMzYzEzNjY0MTc2ZjhjOTEyMzIyNmNkMTdiZjE0ZmMyMDQxM2U4NTRiN2Y0MzE4IiwidGFnIjoiIn0='
      }
    })
    inventory.value = response.data  // Set fetched data to inventory

    // Assuming the shelves are part of the data or can be derived from it
    shelves.value = [...new Set(response.data.map(item => item.shelfNumber))]
  } catch (error) {
    console.error('Error fetching inventory:', error)
  }
}

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

// Fetch inventory data when the component is mounted
onMounted(() => {
  fetchInventory()
})
</script>
