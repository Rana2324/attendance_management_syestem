import { createRouter,createWebHistory } from "vue-router";
import Dashboard from "../views/SuperAdmin/Dashboard.vue";
import Admin from "../views/SuperAdmin/Admin.vue";
import Institution from "../views/SuperAdmin/Institution.vue";
import Analytics from "../views/SuperAdmin/Analytics.vue";


const routes = [
    {path:'/',component:Dashboard,name:'Dashboard'},
    {path:'/admin',component:Admin,name:'Admin'},
    {path:'/institution',component:Institution,name:'Institution'},
    {path:'/analytics',component:Analytics,name:'Analytics'},
];


const router = createRouter({
    history:createWebHistory(),
    routes,
});


export default router;
