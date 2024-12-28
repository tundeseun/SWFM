import { createRouter, createWebHistory } from 'vue-router';
import routes from './utils/routes';
import { useAuthStore } from './stores/auth';
import { useToast } from 'vue-toastification';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Updated navigation guard with async handling
// router.beforeEach(async (to, from, next) => {
//   const authStore = useAuthStore();
//   const toast = useToast();

//   // Handle initial auth check if loading
//   if (authStore.isLoading) {
//     // Wait until the auth check is complete
//     await authStore.checkAuth();  // Assuming checkAuth is async
//   }

//   // Handle routes that require authentication
//   if (to.matched.some(record => record.meta.requiresAuth)) {
//     if (!authStore.isAuthenticated) {
//       toast.warning("Please login to access this page");
//       next({
//         path: '/login',
//         query: { redirect: to.fullPath }  // Redirect back after login
//       });
//     } else {
//       next();  // Proceed if authenticated
//     }
//   } 
//   // Handle login page redirection if already authenticated
//   else if (to.path === '/login' && authStore.isAuthenticated) {
//     next('/app/dashboard');
//   } 
//   // Allow navigation to all other routes
//   else {
//     next();
//   }
// });

export default router;
