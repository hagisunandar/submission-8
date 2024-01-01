//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [{
        path: '/',
        name: 'home',
        component: () => import( /* webpackChunkName: "home" */ '../pages/home.vue')
    },
    {
        path: '/guestbook',
        name: 'guestbook.index',
        component: () => import( /* webpackChunkName: "index" */ '../pages/guestbook/index.vue')
    },
    {
        path: '/create',
        name: 'guestbook.create',
        component: () => import( /* webpackChunkName: "create" */ '../pages/guestbook/create.vue')
    },
    {
        path: '/edit/:id',
        name: 'guestbook.edit',
        component: () => import( /* webpackChunkName: "edit" */ '../pages/guestbook/edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes // <-- routes,
})

export default router
