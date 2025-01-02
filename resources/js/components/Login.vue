<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
      <!-- Logo -->
      <div class="flex justify-center">
        <div class="relative">
          <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center">
            <span class="text-white text-2xl font-bold">S</span>
          </div>
          <div class="absolute -inset-1 bg-primary rounded-xl -z-10"></div>
        </div>
      </div>

      <h2 class="mt-6 text-center text-2xl font-semibold text-gray-900">
        Sign In to Your Account
      </h2>

      <form class="mt-8 space-y-6" @submit.prevent="handleSubmit">
        <!-- Error Message -->
        <div v-if="error" class="bg-red-50 text-red-500 p-3 rounded-md text-sm">
          {{ error }}
        </div>

        <div class="space-y-4">
          <!-- Email Input -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
              Email Address
            </label>
            <div class="mt-1">
              <input
                id="email"
                type="email"
                v-model="email"
                required
                :class="[ 'appearance-none block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm', error ? 'border-red-300' : 'border-gray-300' ]"
                placeholder="admin@example.com"
                :disabled="isLoading"
              />
            </div>
          </div>

          <!-- Password Input -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
              Password
            </label>
            <div class="mt-1">
              <input
                id="password"
                type="password"
                v-model="password"
                required
                :class="[ 'appearance-none block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm', error ? 'border-red-300' : 'border-gray-300' ]"
                placeholder="••••••"
                :disabled="isLoading"
              />
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          :disabled="isLoading"
          class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200"
        >
          <template v-if="isLoading">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Signing in...
          </template>
          <span v-else>Sign In</span>
        </button>

        <!-- Google Sign-In Button -->
        <div id="google-signin-button" class="w-full flex justify-center mt-4"></div>
      </form>
    </div>
  </div>
</template>


<script setup>
import { ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useAuthStore } from '../stores/auth'
import { useToast } from 'vue-toastification'

const router = useRouter()
const route = useRoute()
const authStore = useAuthStore()
const toast = useToast()

const email = ref('')
const password = ref('')
const isLoading = ref(false)
const error = ref('')

const validateForm = () => {
  if (!email.value || !password.value) {
    error.value = 'Please fill in all fields'
    return false
  }
  return true
}

const handleSubmit = async () => {
  error.value = '' // Clear previous errors
  
  if (!validateForm()) {
    toast.error(error.value)
    return
  }

  isLoading.value = true
  
  try {
    const success = authStore.login({
      email: email.value,
      password: password.value
    })

    if (success) {
      toast.success("Successfully logged in!")
      const redirectPath = route.query.redirect || '/app/dashboard'
      router.replace(redirectPath)
    } else {
      error.value = "Invalid email or password"
      toast.error("Invalid email or password")
      // Clear password field on failed attempt
      password.value = ''
    }
  } catch (err) {
    error.value = "An error occurred during login"
    toast.error("An error occurred during login")
  } finally {
    isLoading.value = false
  }
}

// Google Login Integration
const handleGoogleLogin = (response) => {
  const token = response.credential

  if (token) {
    isLoading.value = true
    authStore.googleLogin(token) // Assuming a googleLogin method in your authStore
      .then(() => {
        toast.success("Successfully logged in with Google!")
        const redirectPath = route.query.redirect || '/app/dashboard'
        router.replace(redirectPath)
      })
      .catch((error) => {
        toast.error("An error occurred during login")
      })
      .finally(() => {
        isLoading.value = false
      })
  } else {
    toast.error("Failed to authenticate with Google")
  }
}

onMounted(() => {
  // Initialize Google Login
  google.accounts.id.initialize({
    client_id: "YOUR_GOOGLE_CLIENT_ID",
    callback: handleGoogleLogin,
  })
  
  // Render the Google sign-in button
  google.accounts.id.renderButton(
    document.getElementById('google-signin-button'), 
    {
      theme: 'outline',
      size: 'large',
    }
  )
})
</script>
