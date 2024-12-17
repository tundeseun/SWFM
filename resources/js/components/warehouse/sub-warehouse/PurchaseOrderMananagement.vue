<template>
    <div class="p-6">
      <div class="max-w-6xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md">
        <!-- Tab Navigation -->
        <div class="border-b border-gray-200">
          <nav class="flex -mb-px">
            <button
              v-for="tab in tabs"
              :key="tab.id"
              @click="currentTab = tab.id"
              :class="[
                'px-6 py-4  text-sm font-medium',
                currentTab === tab.id
                  ? 'border-b-2 border-blue-500 text-blue-600'
                  : 'text-gray-500 hover:text-gray-700 hover:border-gray-300'
              ]"
            >
              {{ tab.name }}
            </button>
          </nav>
        </div>
  
        <!-- Request Page -->
        <div v-if="currentTab === 'request'" class="p-6">
          <h2 class="text-2xl font-bold mb-6 text-black">Create Purchase Order</h2>
          
          <!-- Store Sections -->
          <div v-for="section in storeSections" :key="section.id" class="mb-8">
            <h3 class="text-lg font-semibold mb-4 text-black">{{ section.name }}</h3>
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200 text-black">
                <thead class="bg-gray-50 text-black">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bulk Units</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Individual Units</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cost Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-black">
                  <tr v-for="item in section.items" :key="item.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.bulkUnits }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.individualUnits }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ item.costPrice }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <input
                        v-model.number="item.orderQuantity"
                        type="number"
                        min="0"
                        class="w-20 px-2 py-1 border border-gray-300 rounded-md"
                      />
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
  
          <!-- Order Summary -->
          <div class="mt-8 bg-gray-50 p-6 rounded-lg text-black">
            <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
            <div class="space-y-2">
              <div class="text-black flex justify-between">
                <span>Total Items:</span>
                <span>{{ totalItems }}</span>
              </div>
              <div class="text-black flex justify-between font-semibold">
                <span>Total Cost:</span>
                <span>${{ totalCost.toFixed(2) }}</span>
              </div>
            </div>
            <button
              @click="submitOrder"
              class="mt-4 w-full px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-700"
            >
              Submit Order
            </button>
          </div>
        </div>
  
        <!-- Order Details -->
        <div v-if="currentTab === 'details'" class="p-6">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Order Details</h2>
            <div class="space-x-2">
              <button
                @click="printOrder"
                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200"
              >
                <PrinterIcon class="h-5 w-5 inline-block mr-1" />
                Print
              </button>
              <button
                @click="emailOrder"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
              >
                <MailIcon class="h-5 w-5 inline-block mr-1" />
                Email
              </button>
            </div>
          </div>
  
          <!-- Order Status -->
          <div class="mb-6">
            <div class="flex items-center">
              <div class="flex-1">
                <div class="relative">
                  <div class="h-1 bg-blue-600 rounded-full" :style="{ width: `${orderProgress}%` }" />
                  <div class="absolute top-0 h-1 w-full bg-gray-200 -z-1 rounded-full" />
                </div>
                <div class="flex justify-between mt-2">
                  <span class="text-sm" :class="{ 'text-blue-600 font-medium': currentStatus >= 0 }">Ordered</span>
                  <span class="text-sm" :class="{ 'text-blue-600 font-medium': currentStatus >= 1 }">Shipped</span>
                  <span class="text-sm" :class="{ 'text-blue-600 font-medium': currentStatus >= 2 }">Delivered</span>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Order Information -->
          <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6">
              <div>
                <h3 class="text-sm font-medium text-gray-500">Store Information</h3>
                <p class="mt-1">{{ currentOrder.storeName }}</p>
                <p class="mt-1">{{ currentOrder.location }}</p>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-500">Order Information</h3>
                <p class="mt-1">Order #{{ currentOrder.orderNumber }}</p>
                <p class="mt-1">{{ formatDate(currentOrder.orderDate) }}</p>
              </div>
            </div>
          </div>
  
          <!-- Order Items -->
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50 text-black">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cost</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 text-black">
                <tr v-for="item in currentOrder.items" :key="item.id">
                  <td class="px-6 py-4 whitespace-nowrap">{{ item.name }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ item.quantity }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">${{ item.costPrice }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">${{ (item.quantity * item.costPrice).toFixed(2) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
  
        <!-- Order History -->
        <div v-if="currentTab === 'history'" class="p-6">
          <h2 class="text-2xl font-bold mb-6">Order History</h2>
          <div class="space-y-4">
            <div v-for="order in orderHistory" :key="order.id" 
                 class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="font-medium">Order #{{ order.orderNumber }}</h3>
                  <p class="text-sm text-gray-500">{{ formatDate(order.orderDate) }}</p>
                </div>
                <div class="text-right">
                  <p class="font-medium">${{ order.totalCost.toFixed(2) }}</p>
                  <span 
                    :class="[
                      'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',
                      statusClasses[order.status]
                    ]"
                  >
                    {{ order.status }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  import { PrinterIcon, MailIcon } from 'lucide-vue-next'
  
  const currentTab = ref('request')
  const tabs = [
    { id: 'request', name: 'New Order' },
    { id: 'details', name: 'Order Details' },
    { id: 'history', name: 'Order History' }
  ]
  
  // Sample store sections data
  const storeSections = ref([
    {
      id: 1,
      name: 'Grocery',
      items: [
        { id: 1, name: 'Product A', location: 'A1', bulkUnits: 'Case', individualUnits: 24, costPrice: 45.99, orderQuantity: 0 },
        { id: 2, name: 'Product B', location: 'A2', bulkUnits: 'Box', individualUnits: 12, costPrice: 23.99, orderQuantity: 0 }
      ]
    },
    // Add more sections as needed
  ])
  
  // Current order details
  const currentOrder = ref({
    orderNumber: 'PO-2024-001',
    storeName: 'Main Store',
    location: '123 Store St',
    orderDate: new Date(),
    status: 'Shipped',
    items: [
      { id: 1, name: 'Product A', quantity: 2, costPrice: 45.99 },
      { id: 2, name: 'Product B', quantity: 3, costPrice: 23.99 }
    ]
  })
  
  // Order history
  const orderHistory = ref([
    {
      id: 1,
      orderNumber: 'PO-2024-001',
      orderDate: new Date('2024-01-15'),
      totalCost: 234.95,
      status: 'Delivered'
    },
    {
      id: 2,
      orderNumber: 'PO-2024-002',
      orderDate: new Date('2024-01-16'),
      totalCost: 456.78,
      status: 'Shipped'
    }
  ])
  
  // Status styling
  const statusClasses = {
    'Ordered': 'bg-yellow-100 text-yellow-800',
    'Shipped': 'bg-blue-100 text-blue-800',
    'Delivered': 'bg-green-100 text-green-800'
  }
  
  // Computed properties
  const totalItems = computed(() => {
    return storeSections.value.reduce((total, section) => {
      return total + section.items.reduce((sectionTotal, item) => {
        return sectionTotal + (item.orderQuantity || 0)
      }, 0)
    }, 0)
  })
  
  const totalCost = computed(() => {
    return storeSections.value.reduce((total, section) => {
      return total + section.items.reduce((sectionTotal, item) => {
        return sectionTotal + (item.orderQuantity || 0) * item.costPrice
      }, 0)
    }, 0)
  })
  
  const currentStatus = ref(1) // 0: Ordered, 1: Shipped, 2: Delivered
  const orderProgress = computed(() => {
    return (currentStatus.value + 1) * 33.33
  })
  
  // Methods
  const submitOrder = () => {
    // Implement order submission logic
    console.log('Order submitted')
  }
  
  const printOrder = () => {
    window.print()
  }
  
  const emailOrder = () => {
    // Implement email logic
    console.log('Order emailed')
  }
  
  const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'short',
      day: 'numeric'
    })
  }
  </script>