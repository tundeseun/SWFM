<template>
    <div class="bg-white rounded-lg overflow-hidden">
      <!-- <h2 class="text-2xl font-bold p-6 bg-gray-50 border-b">Shelves List</h2> -->
      <div v-if="shelves.length === 0" class="p-6 text-center text-gray-500">
        No shelves created yet. Start by adding a new shelf!
      </div>
      <div v-else class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th v-for="header in tableHeaders" :key="header" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ header }}
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="shelf in shelves" :key="shelf.id" class="hover:bg-gray-50 transition-colors duration-200">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ shelf.id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ shelf.name }}</td>
              <td class="px-6 py-4 text-sm text-gray-500">{{ shelf.description }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ formatDate(shelf.created_at) }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ formatDate(shelf.updated_at) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  

<script setup>

import { ref, onMounted } from 'vue'
import axios from 'axios'

const shelves = ref([])  // Use ref for reactive state
const tableHeaders = ['ID', 'Shelf Name', 'Description', 'Created At', 'Updated At']

const formatDate = (dateString) => {
  return new Date(dateString).toLocaleString()
}

// Fetch shelves data
const fetchShelves = async () => {
  try {
    const response = await axios.get('/api/shelves', {
      headers: {
        'Authorization': 'Bearer eyJpdiI6IkdJU0FPRmk3OGxWNWtDbWYzRzdTRUE9PSIsInZhbHVlIjoiZmYxcDM4Zlg4aTIxbVIya0hldXEwTWs2S28xVUZ0Z0g4WlJhbExWaUZsbndGMGFtaDIxM0REY244Z1hDNTFrNWtaSGpWL0hQbEFsN3laYWU1dWx0OUZtb29BN2NGZEtnYjhJVU0ycWRnUG5EUkc2elB6WHREd1lFc21NQnJhWnMiLCJtYWMiOiJiZWU2ODI5NzNhMjIwYzgyZGMzYzEzNjY0MTc2ZjhjOTEyMzIyNmNkMTdiZjE0ZmMyMDQxM2U4NTRiN2Y0MzE4IiwidGFnIjoiIn0=' // Replace with a valid token
      }
    })
    shelves.value = response?.data || []  // Correctly populate shelves data
    console.log("Shelves fetched:", response?.data)
  } catch (error) {
    console.error('Error fetching shelves:', error.response?.data || error.message || error)
  }
}

// Fetch shelves data when the component is mounted
onMounted(() => {
  fetchShelves()
})
</script>