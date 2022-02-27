import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import SinglePost from "./pages/SinglePost";
import Categories from "./pages/Categories";
import SingleCategory from "./pages/SingleCategory";
import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        //rotta statica
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About,
        },

        //rotta dinamica
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost,
        },

        {
            path: "/categorie",
            name: "categories",
            component: Categories,
        },
        //rotta dinamica
        {
            path: "/categorie/:slug",
            name: "single-category",
            component: SingleCategory,
        },

        //pagina 404
        {
            path: "*",
            name: "page-404",
            component: PageNotFound,
        },
    ],
});

export default router;
