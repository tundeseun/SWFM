import { createRouter, createWebHistory } from 'vue-router';
import routes from './utils/routes';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
