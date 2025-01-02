
<template>
                    
             <!-- Stock Alert -->
             <div class="space-y-2 ">
                <label class="text-sm font-medium text-gray-700">Product Price</label>
                <input
                  type="text"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
                  placeholder="Enter Product Price"
                />
              </div>
    
    </template>
    
    <script setup>
    import { ref } from 'vue'
    import { ChevronDownIcon, BarcodeIcon} from 'lucide-vue-next'

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