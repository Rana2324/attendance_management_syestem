import './bootstrap';
import { createApp } from 'vue';
import pinia from './store/index.js';
import router from './router';
import app from './app.vue';

createApp(app)
    .use(router)
    .use(pinia)
    .mount('#app')
