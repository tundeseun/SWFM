<template>
    <div class="p-6 bg-white rounded-lg shadow-lg p-6 space-y-6">
      <div class="relative mb-6">
        <div class="relative">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Scan/Search Product by Code Or Name"
            class="w-full px-10 py-3 bg-gray-100 rounded-lg focus:outline-none"
          />
          <SearchIcon class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
        </div>
      </div>
  
      <div class="overflow-x-auto">
        <table class="w-full border-collapse mb-6">
          <thead>
            <tr class="bg-gray-200">
              <th
                v-for="header in headers"
                :key="header"
                class="px-4 py-3 text-left text-sm font-medium text-gray-700"
              >
                {{ header }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="products.length === 0">
              <td
                :colspan="headers.length"
                class="px-4 py-4 text-gray-500 text-center"
              >
                No data Available
              </td>
            </tr>
            <tr v-for="product in products" :key="product.name" class="border-t">
              <td
                v-for="header in headers"
                :key="header"
                class="px-4 py-3 text-sm text-gray-800"
              >
                {{ product[header.toLowerCase().replace(' ', '_')] }}
              </td>
            </tr>
          </tbody>
        </table>
  
        <div class="flex justify-end items-center gap-4">
          <span class="font-medium">Total Cost</span>
          <span class="min-w-[100px] text-right">${{ totalCost.toFixed(2) }}</span>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  import { SearchIcon } from 'lucide-vue-next'
  
  const headers = ['Product Name', 'Quantity', 'Cost', 'SubTotal']
  const products = ref([])
  const searchQuery = ref('')
  
  const totalCost = computed(() => {
    return products.value.reduce((sum, product) => {
      return sum + (product.subtotal || 0)
    }, 0)
  })
  
  // Add product function (you can customize this based on your needs)
  const addProduct = (product) => {
    products.value.push({
      product_name: product.name,
      quantity: product.quantity,
      cost: product.cost,
      subtotal: product.quantity * product.cost
    })
  }
  </script>