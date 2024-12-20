<template>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center" 
         :style="{ backgroundImage: 'url(/background.jpg)' }">
      <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md mx-4">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center relative">
            <span class="text-white text-2xl font-bold">S</span>
            <div class="absolute inset-0 bg-purple-400 rounded-full blur opacity-50 transform rotate-45"></div>
          </div>
        </div>
  
        <!-- Sign In Form -->
        <h1 class="text-2xl font-semibold text-center mb-6">Sign In</h1>
        
        <form @submit.prevent="handleSubmit" class="space-y-4">
          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
              Email Address
            </label>
            <input
              id="email"
              v-model="form.email"
              type="email"
              required
              class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
              placeholder="admin@example.com"
            />
          </div>
  
          <!-- Password Field -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
              Password
            </label>
            <input
              id="password"
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              required
              class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
              placeholder="••••••"
            />
          </div>
  
          <!-- Sign In Button -->
          <button
            type="submit"
            class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
            :disabled="loading"
          >
            <span v-if="loading">Signing in...</span>
            <span v-else>Sign In</span>
          </button>
  
          <!-- Forgot Password Link -->
          <div class="text-center">
            <a 
              href="#" 
              class="text-sm text-gray-600 hover:text-purple-600 transition-colors duration-200"
              @click.prevent="handleForgotPassword"
            >
              Forgot Password?
            </a>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, reactive } from 'vue'
  
  // Form state
  const form = reactive({
    email: '',
    password: ''
  })
  
  const loading = ref(false)
  const showPassword = ref(false)
  
  // Form submission handler
  const handleSubmit = async () => {
    try {
      loading.value = true
      // Add your authentication logic here
      console.log('Logging in with:', form)
      
      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 1000))
      
      // Handle successful login
      // Example: router.push('/dashboard')
    } catch (error) {
      console.error('Login failed:', error)
    } finally {
      loading.value = false
    }
  }
  
  // Forgot password handler
  const handleForgotPassword = () => {
    console.log('Forgot password clicked')
    // Add your forgot password logic here
  }
  </script>
  
  <style scoped>
  /* Optional: Add any component-specific styles here */
  </style>