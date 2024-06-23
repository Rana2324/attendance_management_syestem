import { createPinia } from "pinia";
import {useAuthStore} from "./authStore";
import app from "../app.vue";
import {createApp} from "vue";

const pinia = createPinia();
createApp(app).use(pinia);
pinia.use(useAuthStore());

export default pinia;
