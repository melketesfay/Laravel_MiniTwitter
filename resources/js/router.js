import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },
    {
        path: "/test",
        component: () => import("./pages/Test.vue"),
    },
    {
        path: "/laravel",
        component: () => import("./pages/Laravel.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});