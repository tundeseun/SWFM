<template>
    <div class=" p-6">
      <div class="max-w-2xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Create Shelf</h2>
        
        <form @submit.prevent="handleSubmit" class="space-y-6">
          <!-- Shelf Name -->
          <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Shelf Name</label>
            <input
              v-model="form.name"
              type="text"
              id="name"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue'
  
  const form = reactive({
    name: '',
    description: ''
  })
  
  const handleSubmit = () => {
    // Here you would typically send the form data to your backend
    console.log('Shelf created:', form)
    
    // You can add your API call here
    // await createShelf(form)
  }
  </script>