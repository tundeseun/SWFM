
<template>
     <!-- Table -->
     <div class="overflow-x-auto mt-32">
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
        <div class="text-gray-500">No Products items found</div>
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
const fetchProduct = async () => {
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
  fetchProduct()
})
</script>