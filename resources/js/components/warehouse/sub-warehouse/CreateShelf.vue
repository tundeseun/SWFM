<template>
    <div class=" p-6">
      <div class="max-w-2xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Create Shelf</h2>
        
        <form @submit.prevent="handleSubmit" class="space-y-6">
          <!-- Shelf Name -->
          <div class="space-y-2">
            <label for="name" class="block text-black text-sm font-medium text-gray-700">Shelf Name</label>
            <input
              v-model="form.name"
              type="text"
              id="name"
              required
              class="w-full px-3 py-2 border text-black border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Enter shelf name"
            />
          </div>
  
          <!-- Description -->
          <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
              v-model="form.description"
              id="description"
              rows="3"
              required
              class="w-full px-3 py-2 text-black border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Enter shelf description"
            ></textarea>
          </div>
  
          <div class="flex justify-end">
            <button
              type="submit"
              class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            >
              Create Shelf
            </button>
          </div>
        </form>
      </div>


      <!-- Display Shelves Section -->
    <!-- <div class="mt-6 max-w-2xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-bold mb-6 text-black">Shelves List</h2>
      <table class="min-w-full table-auto text-black">
        <thead>
          <tr>
            <th class="px-4 py-2 border-b">ID</th>
            <th class="px-4 py-2 border-b text-nowrap">Shelf Name</th>
            <th class="px-4 py-2 border-b">Description</th>
            <th class="px-4 py-2 border-b">Created At</th>
            <th class="px-4 py-2 border-b">Updated At</th>
          </tr>
        </thead>
        <tbody class="text-black">
          <tr v-for="shelf in shelves" :key="shelf.id">
            <td class="px-4 py-2 border-b ">{{ shelf.id }}</td>
            <td class="px-4 py-2 border-b">{{ shelf.name }}</td>
            <td class="px-4 py-2 border-b">{{ shelf.description }}</td>
            <td class="px-4 py-2 border-b">{{ new Date(shelf.created_at).toLocaleString() }}</td>
            <td class="px-4 py-2 border-b">{{ new Date(shelf.updated_at).toLocaleString() }}</td>
          </tr>
        </tbody>
      </table>
    </div> -->
    
    <div class="mt-20 mb-10">
      <ShelveTable />
    </div>  
  </div>
  </template>
  
  <script setup>
  import { reactive, onMounted } from 'vue'
  import axios from 'axios';
  import ShelveTable from './ShelveTable.vue';




  const form = reactive({
    name: '',
    description: ''
  })
  
 // Function to handle form submission

const handleSubmit = async () => {
  try {
    const response = await axios.post('/api/shelves', {
      name: form.name,
      description: form.description
    }, {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer eyJpdiI6IkdJU0FPRmk3OGxWNWtDbWYzRzdTRUE9PSIsInZhbHVlIjoiZmYxcDM4Zlg4aTIxbVIya0hldXEwTWs2S28xVUZ0Z0g4WlJhbExWaUZsbndGMGFtaDIxM0REY244Z1hDNTFrNWtaSGpWL0hQbEFsN3laYWU1dWx0OUZtb29BN2NGZEtnYjhJVU0ycWRnUG5EUkc2elB6WHREd1lFc21NQnJhWnMiLCJtYWMiOiJiZWU2ODI5NzNhMjIwYzgyZGMzYzEzNjY0MTc2ZjhjOTEyMzIyNmNkMTdiZjE0ZmMyMDQxM2U4NTRiN2Y0MzE4IiwidGFnIjoiIn0=' // Replace <your_token_here> with a valid token
      }
    })

    console.log('Shelf created successfully:', response.data)

    // Optionally reset the form after successful submission
    form.name = ''
    form.description = ''
  } catch (error) {
    console.error('Error creating shelf:', error.response?.data || error.message)
  }
}

  </script>