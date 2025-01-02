<template>
    <div class="mt-32 mb-20 min-h-screen  p-6">
      <div class="">
        <!-- Breadcrumb -->
        <div class="w-full flex items-center gap-2 mb-8 pb-5 text-black border-b border-b-[1px]">
          <h1 class="text-2xl font-semibold text-black">Print Labels</h1>
          <span class="text-black">/</span>
          <span>Products</span>
          <span class="text-black">/</span>
          <span>Print Labels</span>
        </div>
  
        <!-- Form -->
        <div class="space-y-6">
          <!-- Warehouse Selection -->
          <div class="space-y-2">
            <label class="block text-black">
              Warehouse <span class="text-red-400">*</span>
            </label>
            <select 
              v-model="selectedWarehouse" 
              class="w-full p-2.5 bg-white/10 border border-white/20 rounded-md text-black"
            >
              <option value="" disabled>Choose Warehouse</option>
              <option v-for="warehouse in warehouses" :key="warehouse" :value="warehouse">
                {{ warehouse }}
              </option>
            </select>
            <p v-if="!selectedWarehouse" class="text-sm text-red-400">
              This field is required
            </p>
          </div>
  
          <!-- Product Search -->
          <div class="flex items-center gap-x-4">
            <div class="flex flex-col items-center mt-[-3px]">
              <label class="block text-black">Product</label>

            <button  @click="toggleModal" class="cursor-pointer">
                <img src="../assets/scan.png" class="w-12 h-12 rounded-lg" />

              </button>
            </div>

              <input
                type="text"
                v-model="searchQuery"
                placeholder="Scan/Search Product by Code Or Name"
                class="w-full pl-10 p-2.5 border border-black/20 rounded-md text-black placeholder-black/60"
              />
           
          </div>
  
          <!-- Products Table -->
          <div class="overflow-x-auto">
            <table class="w-full text-black">
              <thead class="border-b border-b-[2px] border-t border-t-[2px]">
                <tr class="border-b border-white/20">
                  <th class="text-left py-3 px-4">Product</th>
                  <th class="text-left py-3 px-4">Code Product</th>
                  <th class="text-left py-3 px-4">Quantity</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="!products.length">
                  <td colspan="3" class="py-4 px-4 text-center text-black">
                    No data Available
                  </td>
                </tr>
                <tr v-for="product in products" :key="product.id" class="border-b border-white/20">
                  <td class="py-3 px-4">{{ product.name }}</td>
                  <td class="py-3 px-4">{{ product.code }}</td>
                  <td class="py-3 px-4">{{ product.quantity }}</td>
                </tr>
              </tbody>
            </table>
          </div>
  
          <!-- Paper Size -->
          <div class="space-y-2">
            <label class="block text-black">Paper size</label>
            <select 
              v-model="selectedPaperSize" 
              class="w-full p-2.5 bg-white/10 border border-white/20 rounded-md text-black"
            >
              <option value="" disabled>Paper size</option>
              <option v-for="size in paperSizes" :key="size" :value="size">
                {{ size }}
              </option>
            </select>
          </div>
  
          <!-- Display Price Toggle -->
          <div class="flex items-center space-x-2">
            <input
              type="checkbox"
              id="displayPrice"
              v-model="displayPrice"
              class="w-4 h-4 rounded border-white/20 bg-white/10 text-blue-600"
            />
            <label for="displayPrice" class="text-black">Display Price</label>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const selectedWarehouse = ref('')
  const searchQuery = ref('')
  const selectedPaperSize = ref('')
  const displayPrice = ref(false)
  
  // Sample data
  const warehouses = ['No data shown.']
  const paperSizes = ['A4', 'A5', 'Letter', 'Legal']
  const products = ref([])
  </script>