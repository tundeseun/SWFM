<template>
    <form @submit.prevent="handleSubmit" class="max-w-4xl mx-auto p-6 space-y-8 text-black">
      <!-- First Section -->
      <div class="bg-white rounded-lg shadow-sm p-6 space-y-6 text-black">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Name -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Name <span class="text-red-500">*</span>
            </label>
            <input
              v-model="form.name"
              type="text"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
              placeholder="Enter Name Product"
              required
            />
          </div>
  
          <!-- Product Image -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Product Image <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center gap-4">
              <label class="cursor-pointer flex items-center justify-center w-32 h-8 border-2 border-dashed border-gray-300 rounded-lg hover:border-purple-500">
                <input
                  type="file"
                  class="hidden"
                  accept="image/*"
                  @change="handleImageUpload"
                  required
                />
                <div v-if="!form.image" class="text-center">
                  <!-- <PhotoIcon class="w-8 h-8 mx-auto text-gray-400" /> -->
                 
                  <span class="text-sm text-gray-500">Choose File</span>
                </div>
                <img
                  v-else
                  :src="form.imagePreview"
                  class="w-full h-full object-cover rounded-lg"
                />
              </label>
            </div>
          </div>
  
          <!-- Barcode Symbology -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Barcode Symbology <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.barcodeSymbology"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="code128">Code 128</option>
                <option value="code39">Code 39</option>
                <option value="ean13">EAN-13</option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Code Product -->
          <div class="space-y-2">
           
            <label class="text-sm font-medium text-gray-700">
              Code Product <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center relative flex gap-2">
                <img
                    src="../../../assets/scan.png"
                  class="w-10 h-10  mx-auto  rounded-lg"
                />
              <input
                v-model="form.codeProduct"
                type="text"
                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              />
              <button
                type="button"
                class="px-3 py-2 bg-gray-100 rounded-md hover:bg-gray-200"
                @click="scanBarcode"
              >
                <BarcodeIcon class="w-5 h-5 text-gray-600" />
              </button>
            </div>
            <p class="text-xs text-gray-500">
              Scan your barcode and select the correct symbology below
            </p>
          </div>
  
          <!-- Category -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Category <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.category"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="" disabled>Choose Category</option>
                <option v-for="category in categories" :key="category" :value="category">
                  {{ category }}
                </option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Brand -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Brand <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.brand"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="" disabled>Choose Brand</option>
                <option v-for="brand in brands" :key="brand" :value="brand">
                  {{ brand }}
                </option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Order Tax -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Order Tax</label>
            <div class="relative">
              <input
                v-model="form.orderTax"
                type="number"
                min="0"
                max="100"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
              />
              <span class="absolute right-3 top-2 text-gray-500">%</span>
            </div>
          </div>
  
          <!-- Tax Type -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Tax Type <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.taxType"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="exclusive">Exclusive</option>
                <option value="inclusive">Inclusive</option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
        </div>
  
        <!-- Description -->
        <div class="space-y-2">
          <label class="text-sm font-medium text-gray-700">Description</label>
          <textarea
            v-model="form.description"
            rows="4"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
            placeholder="A few words ..."
          ></textarea>
        </div>
      </div>
  
      <!-- Second Section -->
      <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Type -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Type <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.type"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="standard">Standard Product</option>
                <option value="digital">Digital Product</option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Product Cost -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Product Cost <span class="text-red-500">*</span>
            </label>
            <input
              v-model="form.productCost"
              type="number"
              min="0"
              step="0.01"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
              placeholder="Enter Product Cost"
              required
            />
          </div>
  
          <!-- Product Price -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Product Price <span class="text-red-500">*</span>
            </label>
            <input
              v-model="form.productPrice"
              type="number"
              min="0"
              step="0.01"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
              placeholder="Enter Product Price"
              required
            />
          </div>
  
          <!-- Product Unit -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Product Unit <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.productUnit"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="" disabled>Choose Product Unit</option>
                <option v-for="unit in units" :key="unit" :value="unit">
                  {{ unit }}
                </option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Sale Unit -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Sale Unit <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.saleUnit"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="" disabled>Choose Sale Unit</option>
                <option v-for="unit in units" :key="unit" :value="unit">
                  {{ unit }}
                </option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Purchase Unit -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Purchase Unit <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.purchaseUnit"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
              >
                <option value="" disabled>Choose Purchase Unit</option>
                <option v-for="unit in units" :key="unit" :value="unit">
                  {{ unit }}
                </option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
  
          <!-- Stock Alert -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Stock Alert</label>
            <input
              v-model="form.stockAlert"
              type="number"
              min="0"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
              placeholder="0"
            />
          </div>
        </div>
  
        <!-- Checkboxes -->
        <div class="space-y-4">
          <label class="flex items-center space-x-3">
            <input
              v-model="form.hasSerialNumber"
              type="checkbox"
              class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
            />
            <span class="text-sm text-gray-700">Product Has Imei/Serial Number</span>
          </label>
  
          <label class="flex items-center space-x-3">
            <input
              v-model="form.notForSelling"
              type="checkbox"
              class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
            />
            <span class="text-sm text-gray-700">This Product Not For Selling</span>
          </label>
        </div>
      </div>
  
      <!-- Submit Button -->
      <div class="flex justify-start">
        <button
          type="submit"
          class="px-6 py-2 bg-primary text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
        >
          Submit
        </button>
      </div>
    </form>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { ChevronDownIcon, BarcodeIcon} from 'lucide-vue-next'
  
  // Sample data (replace with your actual data)
  const categories = ['Electronics', 'Clothing', 'Food', 'Books']
  const brands = ['Brand A', 'Brand B', 'Brand C', 'Brand D']
  const units = ['Piece', 'Kg', 'Meter', 'Dozen']
  
  const form = ref({
    name: '',
    image: null,
    imagePreview: null,
    barcodeSymbology: 'code128',
    codeProduct: '',
    category: '',
    brand: '',
    orderTax: 0,
    taxType: 'exclusive',
    description: '',
    type: 'standard',
    productCost: '',
    productPrice: '',
    productUnit: '',
    saleUnit: '',
    purchaseUnit: '',
    stockAlert: 0,
    hasSerialNumber: false,
    notForSelling: false
  })
  
  const handleImageUpload = (event) => {
    const file = event.target.files[0]
    if (file) {
      form.value.image = file
      form.value.imagePreview = URL.createObjectURL(file)
    }
  }
  
  const scanBarcode = () => {
    // Implement barcode scanning functionality
    console.log('Scanning barcode...')
  }
  
  const handleSubmit = () => {
    // Handle form submission
    console.log('Form submitted:', form.value)
  }
  </script>