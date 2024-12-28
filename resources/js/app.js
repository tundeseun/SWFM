// resources/js/app.js
import './assets/main.css'
import { createApp } from 'vue';
import App from './App.vue';
import { createPinia } from 'pinia';
import router from './router.js';

const app = createApp(App);
// const pinia = createPinia();
// console.log('Pinia initialized:', pinia)

// app.use(pinia);
app.use(router);
app.mount('#app');
