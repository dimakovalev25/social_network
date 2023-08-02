import * as VueRouter from "vue-router";

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/'),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('./pages/Home.vue')
        },
        {
            path: '/about',
            name: 'about',
            component: () => import('./pages/About.vue')
        },
        {
            path: '/persons',
            name: 'persons',
            component: () => import('./components/IndexComponent.vue'),
        },
        {
            path: '/posts',
            name: 'posts',
            component: () => import('./components/posts/Show.vue'),
        }
        ,
        {
            path: '/posts/create',
            name: 'posts.create',
            component: () => import('./components/posts/Create.vue'),
        },
        {
            path: '/posts/:id/edit',
            name: 'posts.edit',
            component: () => import('./components/posts/Edit.vue')
        }
    ]

})

export default router
