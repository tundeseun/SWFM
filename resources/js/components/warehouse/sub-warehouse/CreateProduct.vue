<template>
    <div class="mb-32 p-6">
      <div class="max-w-2xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Create Product</h2>
        
        <form @submit.prevent="handleSubmit" class="space-y-6">
          <!-- Product Name -->
          <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input
              v-model="form.name"
              type="text"
              id="name"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
            ></textarea>
          </div>
  
          <!-- Bulk Units -->
          <div class="space-y-2">
            <label for="bulkUnit" class="block text-sm font-medium text-gray-700">Bulk Unit Type</label>
            <select
              v-model="form.bulkUnit"
              id="bulkUnit"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
              <option value="">Select unit type</option>
              <option value="carton">Carton</option>
              <option value="bag">Bag</option>
              <option value="case">Case</option>
            </select>
          </div>
  
          <!-- Individual Units -->
          <div class="space-y-2">
            <label for="individualUnits" class="block text-sm font-medium text-gray-700">Individual Units</label>
            <input
              v-model.number="form.individualUnits"
              type="number"
              id="individualUnits"
              required
              min="1"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
  
          <!-- Weight Information -->
          <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
              <label for="weightPounds" class="block text-sm font-medium text-gray-700">Weight (Pounds)</label>
              <input
                v-model.number="form.weight.pounds"
                type="number"
                id="weightPounds"
                required
                min="0"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>
            <div class="space-y-2">
              <label for="weightOunces" class="block text-sm font-medium text-gray-700">Weight (Ounces)</label>
              <input
                v-model.number="form.weight.ounces"
                type="number"
                id="weightOunces"
                required
                min="0"
                max="15"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>
          </div>
  
          <!-- Seasonal Product -->
          <div class="space-y-2">
            <div class="flex items-center">
              <input
                v-model="form.isSeasonal"
                type="checkbox"
                id="isSeasonal"
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
              />
              <label for="isSeasonal" class="ml-2 block text-sm text-gray-700">Seasonal Product</label>
            </div>
            <select
              v-if="form.isSeasonal"
              v-model="form.seasonalMonth"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
              <option value="">Select month</option>
              <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
            </select>
          </div>
  
          <!-- Shelf Location -->
          <div class="space-y-2">
            <label for="shelf" class="block text-sm font-medium text-gray-700">Shelf Location</label>
            <input
              v-model="form.shelf"
              type="text"
              id="shelf"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
  
          <!-- Product Image -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Product Image</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
              <div class="space-y-1 text-center">
                <svg
                  class="mx-auto h-12 w-12 text-gray-400"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 48 48"
                  aria-hidden="true"
                >
                  <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <label
                    for="file-upload"
                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500"
                  >
                    <span>Upload a file</span>
                    <input
                      @change="handleFileUpload"
                      id="file-upload"
                      name="file-upload"
                      type="file"
                      accept="image/*"
                      class="sr-only"
                    />
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
            <div v-if="form.image" class="mt-2">
              <img :src="form.image" alt="Product preview" class="h-32 w-32 object-cover rounded-md" />
            </div>
          </div>
  
          <div class="bg-gray-50 -mx-6 px-6 py-3 mt-6">
            <div class="text-sm text-gray-500 mb-4">
              <p>Note: Product selling price will be dynamic based on cost price on purchases.</p>
            </div>
            <button
              type="submit"
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bg-green-500"
            >
              Create Product
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, reactive } from 'vue'
  
  const months = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
  ]
  
  const form = reactive({
    name: '',
    description: '',
    bulkUnit: '',
    individualUnits: null,
    weight: {
      pounds: null,
      ounces: null
    },
    isSeasonal: false,
    seasonalMonth: '',
    shelf: '',
    image: null
  })
  
  const handleFileUpload = (event) => {
    const file = event.target.files[0]
    if (file) {
      const reader = new FileReader()
      reader.onload = (e) => {
        form.image = e.target.result
      }
      reader.readAsDataURL(file)
    }
  }
  
  const handleSubmit = () => {
    // Here you would typically send the form data to your backend
    console.log('Form submitted:', form)
    
    // You can add your API call here
    // await createProduct(form)
  }
  </script>