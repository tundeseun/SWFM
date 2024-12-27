import { createRouter, createWebHistory } from 'vue-router';
import routes from './utils/routes';
import { useAuthStore } from './stores/auth';
import { useToast } from 'vue-toastification';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Updated navigation guard
router.beforeEach(async (to, from, next) => {
  const authStore = useAuthStore()
  const toast = useToast()
  
  // Check authentication status
  if (authStore.isLoading) {
    // First time checking auth
    authStore.checkAuth()
  }

  // Handle routes that require authentication
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!authStore.isAuthenticated) {
      toast.warning("Please login to access this page")
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } 
  // Handle login page when already authenticated
  else if (to.path === '/login' && authStore.isAuthenticated) {
    next('/app/dashboard')
  }
  // Allow all other routes
  else {
    next()
  }
})

export default router;
