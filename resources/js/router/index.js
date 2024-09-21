import { createRouter, createWebHistory } from "vue-router";
import AppLayout from "../layouts/AppLayout.vue";
import Dashboard from "../views/SuperAdmin/Dashboard.vue";
import Admin from "../views/SuperAdmin/Admin.vue";
import Institution from "../views/SuperAdmin/Institution.vue";
import Analytics from "../views/SuperAdmin/Analytics.vue";
import CreateInstitution from "../views/SuperAdmin/CreateInstitution.vue";
import EditeInstitution from "../views/SuperAdmin/EditeInstitution.vue";
import CreateAdmin from "../views/SuperAdmin/CreateAdmin.vue";
import EditeAdmin from "../views/SuperAdmin/EditeAdmin.vue";
import Login from "../views/Auth/Login.vue";

const ROLES = {
    STUDENT: "STUDENT",
    TEACHER: "TEACHER",
    ADMIN: "ADMIN",
    SUPER_ADMIN: "SUPER_ADMIN",
};
const routes = [
    {
        path: "/sa",
        meta: { role: ROLES.SUPER_ADMIN },
        component: AppLayout,
        name: "SuperAdmin",
        redirect: { name: "SuperAdminDashboard" },
        children: [
            {
                path: "dashboard",
                component: Dashboard,
                name: "SuperAdminDashboard",
            },
            { path: "institution-admin", component: Admin, name: "Admin" },
            {
                path: "institution",
                component: Institution,
                name: "Institution",
            },
            { path: "analytics", component: Analytics, name: "Analytics" },
            {
                path: "institution/create",
                component: CreateInstitution,
                name: "createInstitution",
            },
            {
                path: "institution/edit/:id",
                component: EditeInstitution,
                name: "editInstitution",
            },
            {
                path: "institution-admin/create",
                component: CreateAdmin,
                name: "createAdmin",
            },
            {
                path: "/institution-admin/edit/:id",
                component: EditeAdmin,
                name: "editeAdmin",
            },
        ],
    },
    // {
    //   path: "/ad",
    //   meta: { role: ROLES.ADMIN },
    //   component: AppLayout,
    //   redirect: { name: "InstitutionAdminDashboard" },
    //   children: [
    //     { path: "dashboard", component: Dashboard, name: "InstitutionAdminDashboard" },
    //   ],
    // },
    {
        path: "/login",
        component: Login,
        name: "Login",
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

export default router;
