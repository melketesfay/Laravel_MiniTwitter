import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/Index.vue"),
    },
    {
        path: "/edit/:id",
        component: () => import("./pages/Edit.vue"),
    },
    {
        path: "/create",
        component: () => import("./pages/Create.vue"),
    },
    {
        path: "/tweet/:id",
        component: () => import("./pages/Show.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});