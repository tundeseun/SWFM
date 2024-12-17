<template>
  <div class="p-6  min-h-screen mb-5">
    <!-- Filters Section -->
    <div class="flex gap-4 mb-6">
      <div class="relative w-64">
        <select 
          v-model="selectedWarehouse"
          class="w-full p-2.5 bg-white border border-gray-200 rounded-lg appearance-none cursor-pointer text-gray-700"
        >
          <option value="">Filter by warehouse</option>
          <option v-for="warehouse in warehouses" :key="warehouse" :value="warehouse">
            {{ warehouse }}
          </option>
        </select>
        <ChevronDown class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500" />
      </div>
      
      <div class="relative">
        <input 
          type="text" 
          v-model="dateRange"
          class="p-2.5 bg-white border border-gray-200 rounded-lg text-gray-700"
          readonly
        />
      </div>
    </div>

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
      <div 
        v-for="metric in metrics" 
        :key="metric.title"
        class="bg-white p-4 rounded-lg border border-gray-100 flex items-center gap-4"
      >
        <div class="p-3 rounded-lg" :class="metric.bgColor">
          <component :is="metric.icon" class="w-6 h-6" :class="metric.iconColor" />
        </div>
        <div>
          <h3 class="text-sm text-gray-600">{{ metric.title }}</h3>
          <p class="text-xl font-semibold text-primary">$ {{ metric.value }}</p>
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-32">
      <!-- Bar Chart -->
      <div class="lg:col-span-2 bg-white p-6 rounded-lg border border-gray-100">
        <h2 class="text-lg font-semibold mb-4 text-black">This Week Sales & Purchases</h2>
        <canvas ref="barChart"></canvas>
      </div>

      <!-- Pie Chart -->
      <div class="bg-white p-6 rounded-lg border border-gray-100">
        <h2 class="text-lg font-semibold mb-4 text-black">Top Selling Products (2024)</h2>
        <canvas ref="pieChart"></canvas>
      </div>
    </div>
    
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import Chart from 'chart.js/auto'
import { 
  ShoppingCart, 
  ArrowDownLeft,
  ArrowUpRight,
  ChevronDown,
  ShoppingBag
} from 'lucide-vue-next'

// Data
const selectedWarehouse = ref('')
const dateRange = ref('2024-12-17 - 2024-12-17')
const warehouses = ['Warehouse A', 'Warehouse B', 'Warehouse C']

const metrics = [
  {
    title: 'Sales',
    value: '0.00',
    icon: ShoppingCart,
    bgColor: 'bg-green-50',
    iconColor: 'text-green-700'
  },
  {
    title: 'Purchases',
    value: '0.00',
    icon: ShoppingBag,
    bgColor: 'bg-blue-50',
    iconColor: 'text-blue-600'
  },
  {
    title: 'Sales Return',
    value: '0.00',
    icon: ArrowDownLeft,
    bgColor: 'bg-orange-50',
    iconColor: 'text-orange-600'
  },
  {
    title: 'Purchases Return',
    value: '0.00',
    icon: ArrowUpRight,
    bgColor: 'bg-green-50',
    iconColor: 'text-green-600'
  }
]

// Chart refs
const barChart = ref(null)
const pieChart = ref(null)

// Initialize charts
onMounted(() => {
  // Bar Chart
  new Chart(barChart.value, {
    type: 'bar',
    data: {
      labels: ['12-10', '12-11', '12-12', '12-13', '12-14', '12-15', '12-16'],
      datasets: [
        {
          label: 'Sales',
          data: [0, 0, 0, 50000, 0, 0, 0],
          backgroundColor: '#00ff99',
          borderColor: '#00ff99',
          borderWidth: 1
        },
        {
          label: 'Purchases',
          data: [0, 0, 0, 600000, 0, 0, 0],
          backgroundColor: '#00ff99',
          borderColor: '#00ff99',
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: '#00ff99'
          }
        },
        x: {
          grid: {
            display: false
          }
        }
      }
    }
  })

  // Pie Chart
  new Chart(pieChart.value, {
    type: 'pie',
    data: {
      labels: ['Golden Penn...', 'Golden ...', 'Golde...', 'Vitamilk Soy...', 'Golden Penn...'],
      datasets: [{
        data: [20, 20, 20, 20, 20],
        backgroundColor: [
          '#00ff99',
          '#90EE90',
          '#0BDA51',
          '#00A550',
          '#00A550'
        ],
        borderColor: 'white',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'right'
        }
      }
    }
  })
})
</script>