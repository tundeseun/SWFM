import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useAuthStore = defineStore('auth', () => {
  const user = ref(null)
  const isAuthenticated = ref(false)
  const isLoading = ref(true) // Add loading state

  // Dummy users for testing
  const dummyUsers = [
    { email: 'admin@example.com', password: 'admin123' }
  ]

  const checkAuth = () => {
    isLoading.value = true
    const savedAuth = localStorage.getItem('auth')
    
    if (savedAuth) {
      const authData = JSON.parse(savedAuth)
      user.value = authData.user
      isAuthenticated.value = true
    } else {
      user.value = null
      isAuthenticated.value = false
    }
    
    isLoading.value = false
  }

  const login = ({ email, password }) => {
    const foundUser = dummyUsers.find(
      user => user.email === email && user.password === password
    )
    
    if (foundUser) {
      user.value = { email: foundUser.email }
      isAuthenticated.value = true
      localStorage.setItem('auth', JSON.stringify({ user: { email: foundUser.email } }))
      return true
    }
    return false
  }

  const logout = () => {
    user.value = null
    isAuthenticated.value = false
    localStorage.removeItem('auth')
  }

  return {
    user,
    isAuthenticated,
    isLoading,
    login,
    logout,
    checkAuth
  }
})