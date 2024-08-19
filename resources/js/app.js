import './bootstrap';
import { createApp } from 'vue';
import pinia from './store/index.js';
import router from './router';
import App from './app.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


const app = createApp(App);
app.use(router)
app.use(pinia)
app.use(VueSweetalert2)
app.mount('#app')
