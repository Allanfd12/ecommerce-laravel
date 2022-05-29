import { createRouter, createWebHistory } from "vue-router";

import ListCategoryComponent from "../components/admin/category/ListCategoryComponent";
import addCategoryComponent from "../components/admin/category/AddCategoryComponent";

const routes = [
    {
        path: "/vue",
        name: "category.list",
        component: ListCategoryComponent
    },
    {
        path: "/admin/category/add",
        name: "category.create",
        component: addCategoryComponent
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
});