import Vue from 'vue'
import VueRouter from 'vue-router'

import TopPage from './pages/TopPage.vue'
import Login from './pages/Login.vue'
import ProductListsPage from './pages/ProductListsPage.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: TopPage
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/productList/:page',
    component: ProductListsPage,
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router