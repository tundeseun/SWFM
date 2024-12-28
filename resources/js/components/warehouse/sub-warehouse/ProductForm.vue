<template>
  <main class="mt-32 mb-20">
    <form @submit.prevent="handleSubmit" class="max-w-4xl p-6 space-y-8 text-black">
      <!-- First Section -->
      <div class="bg-white rounded-lg shadow-lg border-2 border-[#fafafa] p-6 space-y-6 text-black">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Name -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Name <span class="text-red-500">*</span>
            </label>
            <input v-model="form.name" type="text"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
              placeholder="Enter Name Product" required />
          </div>

          <!-- Product Image -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Product Image <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center gap-4">
              <label
                class="cursor-pointer flex items-center justify-center w-32 h-8 border-2 border-dashed border-gray-300 rounded-lg hover:border-primary">
                <input type="file" class="hidden" accept="image/*" @change="handleImageUpload" required />
                <div v-if="!form.image" class="text-center">
                  <!-- <PhotoIcon class="w-8 h-8 mx-auto text-gray-400" /> -->

                  <span class="text-sm text-gray-500">Choose File</span>
                </div>
                <img v-else :src="form.imagePreview" class="w-full h-full object-cover rounded-lg" />
              </label>
            </div>
          </div>

          <!-- Barcode Symbology -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Barcode Symbology <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select v-model="form.barcodeSymbology"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
                required>
                <option value="code128">Code 128</option>
                <option value="code39">Code 39</option>
                <option value="ean13">EAN8</option>
                <option value="ean13">EAN13</option>
                <option value="ean13">UPC</option>
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
              <button  @click="toggleModal" class="cursor-pointer">
                <img src="../../../assets/scan.png" class="w-10 h-10  mx-auto  rounded-lg" />

              </button>
              <input v-model="form.codeProduct" type="text"
                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2" required />
              <button type="button" class="px-3 py-2 bg-gray-100 rounded-md hover:bg-gray-200" @click="scanBarcode">
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
              <select v-model="form.category"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
                required>
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
              <select v-model="form.brand"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
                required>
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
              <input v-model="form.orderTax" type="number" min="0" max="100"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 " />
              <span class="absolute right-3 top-2 text-gray-500">%</span>
            </div>
          </div>

          <!-- Tax Type -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Tax Type <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select v-model="form.taxType"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2 "
                required>
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
          <textarea v-model="form.description" rows="4"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 "
            placeholder="A few words ..."></textarea>
        </div>
      </div>


      <div>
        <ComboProductTypeLIst v-if="form.type === 'combo'" />
      </div>

      <!-- Second Section -->
      <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Type -->
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">
              Type <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select v-model="form.type"
                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-2"
                required>
                <option value="standard">Standard Product</option>
                <option value="variable">Variable Product</option>
                <option value="service">Service Product</option>
                <option value="combo">Combo Product</option>
              </select>
              <ChevronDownIcon class="absolute right-3 top-3 w-4 h-4 text-gray-400" />
            </div>
          </div>
          <StandardProductType v-if="form.type === 'standard'" />
          <VariableProductType v-if="form.type === 'variable'" />
          <ServiceProductType v-if="form.type === 'service'" />
          <ComboProductType v-if="form.type === 'combo'" />
        </div>

      </div>

      <div class="bg-white shadow-lg rounded p-4">
        <div class="flex flex-col gap-2">
          <label class="flex items-center gap-2">
            <input type="checkbox" v-model="productHasIMEI" class="form-checkbox" />
            <span>Product Has Imei/Serial Number</span>
          </label>
          <label class="flex items-center gap-2">
            <input type="checkbox" v-model="productNotForSelling" class="form-checkbox" />
            <span>This Product Not For Selling</span>
          </label>
        </div>
      </div>

      <div>
        <CreateProduct />
      </div>

      <!-- Submit Button -->
      <div class="flex justify-start">
        <button type="submit"
          class="px-6 py-2 bg-primary text-white rounded-md hover:bg-primary focus:outline-none focus:ring-2  focus:ring-offset-2">
          Submit
        </button>
      </div>
    </form>



     <!-- Barcode Scanner Modal -->
     <div
      v-if="isModalOpen"
      class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
    >
      <div class="bg-white rounded-lg shadow-lg p-4 max-w-md w-full space-y-4">
        <h2 class="text-lg font-medium">Scan Barcode</h2>
        <div id="barcode-scanner" class="w-full h-64 bg-gray-100"></div>
        <button
          @click="closeModal"
          class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
        >
          Close
        </button>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { ChevronDownIcon, BarcodeIcon } from 'lucide-vue-next'
import StandardProductType from '@/components/StandardProductType.vue';
import VariableProductType from '@/components/VariableProductType.vue';
import ServiceProductType from '@/components/ServiceProductType.vue';
import ComboProductType from '@/components/ComboProductType.vue';
import ComboProductTypeLIst from '@/components/ComboProductTypeLIst.vue';
import CreateProduct from './CreateProduct.vue';
import Quagga from 'quagga';

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

const isModalOpen = ref(false);

const toggleModal = () => {
  isModalOpen.value = !isModalOpen.value;
  if (isModalOpen.value) startBarcodeScanner();
};


// const startBarcodeScanner = () => {
//   Quagga.init(
//     {
//       inputStream: {
//         type: 'LiveStream',
//         target: document.querySelector('#barcode-scanner'),
//         constraints: {
//           facingMode: 'environment' // Use the back camera
//         }
//       },
//       decoder: {
//         readers: ['code_128_reader', 'ean_reader']
//       }
//     },
//     (err) => {
//       if (err) {
//         console.error(err);
//         return;
//       }
//       Quagga.start();
//     }
//   );

//   Quagga.onDetected((result) => {
//     if (result && result.codeResult) {
//       form.value.codeProduct = result.codeResult.code;
//       closeModal();
//     }
//   });
// };


// Add a ref to track if Quagga is initialized
const isQuaggaInitialized = ref(false);

const startBarcodeScanner = async () => {
  try {
    await Quagga.init({
      inputStream: {
        type: 'LiveStream',
        target: document.querySelector('#barcode-scanner'),
        constraints: {
          facingMode: 'environment' // Use the back camera
        }
      },
      decoder: {
        readers: ['code_128_reader', 'ean_reader']
      }
    });
    
    isQuaggaInitialized.value = true;
    Quagga.start();

    Quagga.onDetected((result) => {
      if (result && result.codeResult) {
        form.value.codeProduct = result.codeResult.code;
        closeModal();
      }
    });
  } catch (err) {
    console.error('Error initializing scanner:', err);
    alert('Error initializing scanner. Please ensure your camera is available.');
    closeModal();
  }
};

const stopBarcodeScanner = () => {
  if (isQuaggaInitialized.value) {
    try {
      Quagga.stop();
      isQuaggaInitialized.value = false;
    } catch (err) {
      console.error('Error stopping scanner:', err);
    }
  }
};

const closeModal = () => {
  isModalOpen.value = false;
  stopBarcodeScanner();
};

// Cleanup on component unmount
onBeforeUnmount(() => {
  stopBarcodeScanner();
});

const handleSubmit = () => {
  // Handle form submission
  console.log('Form submitted:', form.value)
}
</script>