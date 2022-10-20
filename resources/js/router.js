import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import PostsPage from './pages/PostsPage.vue';
import ContactsPage from './pages/ContactsPage.vue';
import ShowPost from './pages/ShowPost.vue';
import App404 from './pages/App404.vue';

const router = new VueRouter({
    mode: 'history',
    routes:     [
                    {
                        path: '/',
                        name: 'home',
                        component: HomePage
                    },
                    {
                        path: '/posts',
                        name: 'posts',
                        component: PostsPage
                    },
                    {
                        path: '/contacts',
                        name: 'contacts',
                        component: ContactsPage
                    },
                    {
                        path: '/posts/:slug',
                        name: 'post',
                        component: ShowPost
                    },
                    {
                        path: '/*',
                        name: '404',
                        component: App404
                    },
                ]
});

export default router