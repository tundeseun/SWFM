<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-32 mb-20">
      <h2 class="text-2xl font-bold mb-6">Pallet Settings</h2>
      
      <div class="mb-6">
        <p class="text-gray-600 mb-4">
          Here is where we customize the settings for the pallets
        </p>
      </div>
  
      <form @submit.prevent="savePalletSettings" class="space-y-6">
        <!-- Basic Pallet Settings -->
        <div class="space-y-4">
          <div>
            <label for="totalPallets" class="block text-sm font-medium text-gray-700">
              Total number of pallets
            </label>
            <input
              id="totalPallets"
              v-model.number="settings.totalPallets"
              type="number"
              min="1"
              required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>
  
          <div>
            <label for="maxWeight" class="block text-sm font-medium text-gray-700">
              Max pallet weight
            </label>
            <input
              id="maxWeight"
              v-model.number="settings.maxWeight"
              type="number"
              min="0"
              step="0.1"
              required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>
  
          <div>
            <label for="minWeight" class="block text-sm font-medium text-gray-700">
              Minimum Pallet weight
            </label>
            <input
              id="minWeight"
              v-model.number="settings.minWeight"
              type="number"
              min="0"
              step="0.1"
              required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>
        </div>
  
        <!-- Product Groups -->
        <div class="space-y-4">
          <h3 class="text-lg font-medium text-gray-900">Group products per pallet</h3>
          <p class="text-sm text-gray-600">
            Here, we will specify the categories of products that can go in the same pallet. Add groups as needed to create product combinations.
          </p>
  
          <div v-for="(group, index) in settings.productGroups" :key="index" class="p-4 border rounded-md bg-gray-50">
            <div class="flex items-center justify-between mb-2">
              <h4 class="font-medium">Group {{ index + 1 }}</h4>
              <button
                type="button"
                @click="removeGroup(index)"
                class="text-red-600 hover:text-red-800"
              >
                <TrashIcon class="h-5 w-5" />
              </button>
            </div>
            
            <input
              v-model="group.categories"
              type="text"
              placeholder="Enter product categories (comma-separated)"
              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>
  
          <button
            type="button"
            @click="addGroup"
            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
          >
            <PlusIcon class="h-5 w-5 mr-2" />
            Add Group
          </button>
        </div>
  
        <!-- Submit Button -->
        <div class="pt-4">
          <button
            type="submit"
            class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
          >
            Save Settings
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { PlusIcon, TrashIcon } from 'lucide-vue-next'
  
  const settings = ref({
    totalPallets: 1,
    maxWeight: 0,
    minWeight: 0,
    productGroups: []
  })
  
  const addGroup = () => {
    settings.value.productGroups.push({
      categories: ''
    })
  }
  
  const removeGroup = (index) => {
    settings.value.productGroups.splice(index, 1)
  }
  
  const savePalletSettings = () => {
    // Validate that min weight is less than max weight
    if (settings.value.minWeight >= settings.value.maxWeight) {
      alert('Minimum weight must be less than maximum weight')
      return
    }
  
    // Here you would typically save the settings to your backend
    console.log('Saving settings:', settings.value)
  }
  </script>