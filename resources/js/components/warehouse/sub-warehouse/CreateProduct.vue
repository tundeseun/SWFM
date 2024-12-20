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
            class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
            class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          ></textarea>
        </div>

        <!-- Bulk Unit -->
        <div class="space-y-2">
          <label for="bulkUnit" class="block text-sm font-medium text-gray-700">Bulk Unit Type</label>
          <select
            v-model="form.bulkUnit"
            id="bulkUnit"
            required
            class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Select unit type</option>
            <option value="kg">kg</option>
            <option value="pc">pc</option>
          </select>
        </div>

        <!-- Individual Unit -->
        <div class="space-y-2">
          <label for="individualUnit" class="block text-sm font-medium text-gray-700">Individual Unit Type</label>
          <select
            v-model="form.individualUnit"
            id="individualUnit"
            required
            class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Select unit type</option>
            <option value="kg">kg</option>
            <option value="pc">pc</option>
          </select>
        </div>

        <!-- Weight Information -->
        <div class="grid grid-cols-2 gap-4">
          <div class="space-y-2">
            <label for="bulkWeight" class="block text-sm font-medium text-gray-700">Bulk Weight (kg)</label>
            <input
              v-model.number="form.bulkWeight"
              type="number"
              id="bulkWeight"
              required
              min="0"
              class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
          <div class="space-y-2">
            <label for="individualWeight" class="block text-sm font-medium text-gray-700">Individual Weight (kg)</label>
            <input
              v-model.number="form.individualWeight"
              type="number"
              id="individualWeight"
              required
              min="0"
              class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
              class="h-4 text-black w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
            />
            <label for="isSeasonal" class="ml-2 block text-sm text-gray-700">Seasonal Product</label>
          </div>
          <select
            v-if="form.isSeasonal"
            v-model="form.seasonMonth"
            class="w-full px-3 text-black py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          >
            <option class="text-black" value="">Select month</option>
            <option class="text-black" v-for="month in months" :key="month" :value="month">{{ month }}</option>
          </select>
        </div>

        <!-- Shelf Location -->
        <!-- <div class="space-y-2">
          <label for="shelf" class="block text-sm font-medium text-gray-700">Shelf Location</label>
          <input
            v-model="form.shelf"
            type="text"
            id="shelf"
            required
            class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          />
        </div> -->

        <!-- Shelf Selection -->
<div class="space-y-2">
  <label for="shelf" class="block text-sm font-medium text-gray-700">Shelf</label>
  <select
    v-model="form.shelf"
    id="shelf"
    required
    class="w-full text-black px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
  >
    <option value="">Select a shelf</option>
    <option v-for="shelf in shelves" :key="shelf.id" :value="shelf.id">{{ shelf.name }}</option>
  </select>
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
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bg-green-500"
          >
            Create Product
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import axios from 'axios'

const months = [
  'January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'
]

const form = reactive({
  name: '',
  description: '',
  bulkUnit: '',
  individualUnit: '',
  bulkWeight: null,
  individualWeight: null,
  isSeasonal: true,
  seasonMonth: '',
  shelf: '',
  image: null
})


console.log("isSeasonal", form.isSeasonal)

// const handleFileUpload = (event) => {
//   const file = event.target.files[0]
//   if (file) {
//     const reader = new FileReader()
//     reader.onload = (e) => {
//       form.image = e.target.result
//     }
//     reader.readAsDataURL(file)
//   }
// }


const handleFileUpload = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.imageFile = file
    const reader = new FileReader()
    reader.onload = (e) => {
      form.image = e.target.result // For preview purposes
    }
    reader.readAsDataURL(file)
  }
}


const shelves = ref([])

const fetchShelves = async () => {
  try {
    const response = await axios.get('/api/shelves', {
      headers: {
        'Authorization': 'Bearer eyJpdiI6IkdJU0FPRmk3OGxWNWtDbWYzRzdTRUE9PSIsInZhbHVlIjoiZmYxcDM4Zlg4aTIxbVIya0hldXEwTWs2S28xVUZ0Z0g4WlJhbExWaUZsbndGMGFtaDIxM0REY244Z1hDNTFrNWtaSGpWL0hQbEFsN3laYWU1dWx0OUZtb29BN2NGZEtnYjhJVU0ycWRnUG5EUkc2elB6WHREd1lFc21NQnJhWnMiLCJtYWMiOiJiZWU2ODI5NzNhMjIwYzgyZGMzYzEzNjY0MTc2ZjhjOTEyMzIyNmNkMTdiZjE0ZmMyMDQxM2U4NTRiN2Y0MzE4IiwidGFnIjoiIn0=' // Replace with a valid token
      }
    })
    shelves.value = response?.data || []  // Correctly populate shelves data
    console.log("Shelves fetched on:", response?.data[0]?.id )
    console.log("Shelves", shelves.value )
  }
   catch (error) {
    console.error('Error fetching shelves:', error.response?.data || error.message || error)
  }
}

// Fetch shelves data when the component is mounted
onMounted(() => {
  fetchShelves()
})

const handleSubmit = async () => {
  const formData = new FormData()
  formData.append('name', form.name)
  formData.append('description', form.description)
  formData.append('bulk_unit', form.bulkUnit)
  formData.append('individual_unit', form.individualUnit)
  formData.append('bulk_weight', form.bulkWeight)
  formData.append('individual_weight', form.individualWeight)
  formData.append('is_seasonal', form.isSeasonal)
  formData.append('season_month', form.seasonMonth)
  // formData.append('shelf_id', shelves.value)
  formData.append('shelf_id', form.shelf)

  if (form.image) {
    formData.append('picture', form.imageFile)
  }

  try {
    const response = await axios.post('/api/products', formData, {
      headers: {
        'Authorization': 'Bearer eyJpdiI6IkdJU0FPRmk3OGxWNWtDbWYzRzdTRUE9PSIsInZhbHVlIjoiZmYxcDM4Zlg4aTIxbVIya0hldXEwTWs2S28xVUZ0Z0g4WlJhbExWaUZsbndGMGFtaDIxM0REY244Z1hDNTFrNWtaSGpWL0hQbEFsN3laYWU1dWx0OUZtb29BN2NGZEtnYjhJVU0ycWRnUG5EUkc2elB6WHREd1lFc21NQnJhWnMiLCJtYWMiOiJiZWU2ODI5NzNhMjIwYzgyZGMzYzEzNjY0MTc2ZjhjOTEyMzIyNmNkMTdiZjE0ZmMyMDQxM2U4NTRiN2Y0MzE4IiwidGFnIjoiIn0=' // Replace with a valid token
      }
    })
    console.log('Product created successfully:', response.data)
  } catch (error) {
    console.error('Error creating product:', error)
  }
}
</script>
