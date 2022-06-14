import { createRouter, createWebHistory } from "vue-router";

import ListCategoryComponent from "../components/admin/category/ListCategoryComponent";
import addCategoryComponent from "../components/admin/category/AddCategoryComponent";
import editCategoryComponent from "../components/admin/category/EditCategoryComponent";
import LoginComponent from "../components/admin/auth/LoginComponent";
import RegisterComponent from "../components/admin/auth/RegisterComponent";
const routes = [
    {
        path: "/vue/login",
        name: "login",
        component: LoginComponent
    },
    {
        path: "/vue/register",
        name: "register",
        component: RegisterComponent
    },
    {
        path: "/vue",
        name: "category.index",
        component: ListCategoryComponent
    },
    {
        path: "/vue/admin/category/add",
        name: "category.create",
        component: addCategoryComponent
    },
    {
        path: "/vue/admin/category/:id/edit",
        name: "category.edit",
        component: editCategoryComponent,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
});