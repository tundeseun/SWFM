
<template>

   
        <!-- Product Cost -->
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Product Cost <span class="text-red-500">*</span>
            </label>
            <input
             
              type="number"
              min="0"
              step="0.01"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
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
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
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
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
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
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
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
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
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
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
              placeholder="0"
            />
          </div>
    
</template>

<script setup>
import { ref } from 'vue'
import { ChevronDownIcon, BarcodeIcon} from 'lucide-vue-next'

// Sample data (replace with your actual data)
const categories = ['FOOD ITEM', 'BEVERAGES', 'PERSONAL CARE']
const brands = [ 
"GOLDEN PENNY",
"C-WAY",
"CAPRISONNE",
"DANO",
"VITAMILK",
"CHIVITA",
"COCACOLA",
"NIVEA",
"DOVE",
"HUGGIES",
"BIG BULL"
]

const units = ['No unit found']

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