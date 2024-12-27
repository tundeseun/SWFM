// import './assets/main.css'
// import router from './router.js'

// import { createApp } from 'vue'
// import App from './App.vue'

// const app = createApp(App);
// app.use(router);
// app.mount('#app');


import './assets/main.css'
import router from './router.js'

import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'


const app = createApp(App);

const pinia = createPinia()


app.use(pinia)
app.use(router);
app.mount('#app');


