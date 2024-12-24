
<template>

    
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

  
          <!-- Product Unit -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Sale Unit <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.productUnit"
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
            <!-- Product Unit -->
            <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Purchase Unit <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select
                v-model="form.productUnit"
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

            <div>
                
         <!-- Stock Alert -->
         <div class="space-y-2 ">
            <label class="text-sm font-medium text-gray-700">Stock Alert</label>
            <input
              v-model="form.stockAlert"
              type="number"
              min="0"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
              placeholder="0"
            />
          </div>

          <!-- variant -->
          <div class="mt-9">
    <div class="flex gap-4 mb-6">
      <input
        v-model="newVariant"
        type="text"
        placeholder="Enter the Variant"
        class="flex-1 px-4 py-2 pr-64 border border-gray-200 rounded-lg focus:outline-none focus:border-primary"
      />
      <button
        @click="createVariant"
        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary transition-colors"
      >
        Create
      </button>
    </div>

    <div class="">
      <table class="w-full border-collapse pr-64">
        <thead>
          <tr class="bg-gray-100 ">
            <th
              v-for="header in headers"
              :key="header"
              class="px-4 text-nowrap  py-3 w-full text-left text-sm font-medium text-gray-700"
            >
              {{ header }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="variants.length === 0">
            <td
              :colspan="headers.length"
              class="px-4 py-4 text-gray-500 text-center border-t text-left"
            >
              No data Available
            </td>
          </tr>
          <tr v-for="variant in variants" :key="variant.code" class="border-t">
            <td
              v-for="header in headers"
              :key="header"
              class="px-4 py-3 text-sm text-gray-800"
            >
              {{ variant[header.toLowerCase().replace(' ', '_')] }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
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


const headers = ['Variant code', 'Variant Name', 'Variant cost', 'Variant price']
const variants = ref([])
const newVariant = ref('')

const createVariant = () => {
  if (newVariant.value.trim()) {
    variants.value.push({
      variant_code: `VAR${variants.value.length + 1}`,
      variant_name: newVariant.value,
      variant_cost: '$0.00',
      variant_price: '$0.00'
    })
    newVariant.value = ''
  }
}
</script>