import { createRouter, createWebHistory } from "vue-router";

import ListCategoryComponent from "../components/admin/category/ListCategoryComponent.vue";

const routes = [
    {
        path: "/admin/category",
        name: "admin/list-category",
        component: ListCategoryComponent
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});