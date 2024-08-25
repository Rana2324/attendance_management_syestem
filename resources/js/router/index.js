import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/SuperAdmin/Dashboard.vue";
import Admin from "../views/SuperAdmin/Admin.vue";
import Institution from "../views/SuperAdmin/Institution.vue";
import Analytics from "../views/SuperAdmin/Analytics.vue";
import CreateInstitution from "../views/SuperAdmin/CreateInstitution.vue";
import EditeInstitution from "../views/SuperAdmin/EditeInstitution.vue";
import CreateAdmin from "../views/SuperAdmin/CreateAdmin.vue";
import EditeAdmin from "../views/SuperAdmin/EditeAdmin.vue";

const routes = [
    { path: "/", component: Dashboard, name: "Dashboard" },
    { path: "/institution-admin", component: Admin, name: "Admin" },
    { path: "/institution", component: Institution, name: "Institution" },
    { path: "/analytics", component: Analytics, name: "Analytics" },
    {
        path: "/institution/create",
        component: CreateInstitution,
        name: "createInstitution",
    },
    {
        path: "/institution/edit/:id",
        component: EditeInstitution,
        name: "editInstitution",
    },
    {
        path: "/institution-admin/create",
        component: CreateAdmin,
        name: "createAdmin",
    },
    {
        path: "/institution-admin/edit/:id",
        component: EditeAdmin,
        name: "editeAdmin",
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

export default router;
