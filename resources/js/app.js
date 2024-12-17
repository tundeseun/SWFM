// resources/js/app.js
import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHistory } from 'vue-router'; 
import routes from '@/utils/routes';  // Import routes from routes.js

// Create the router instance
const router = createRouter({
    history: createWebHistory(),  // Use the HTML5 History API
    routes,  // Assign the routes from routes.js
});

// Create and mount the Vue app
createApp(App)
    .use(router)  // Use the router instance in the Vue app
    .mount('#app');
