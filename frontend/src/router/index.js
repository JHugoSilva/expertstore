import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/auth/login',
      name: 'login',
      component: () => import('../views/auth/LoginView.vue')
    },
    {
      path: '/admin',
      component: () => import('../views/layouts/AdminView.vue'),
      children: [
        {
          path: 'products',
          name: 'admin.products',
          component: () => import('../views/admin/products/ProductsView.vue')
        },
        {
          path: 'products/create',
          name: 'admin.products.create',
          component: () => import('../views/admin/products/ProductsCreateView.vue')
        }
      ]
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
