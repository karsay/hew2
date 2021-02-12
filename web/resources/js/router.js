import Vue from 'vue'
import VueRouter from 'vue-router'

import TopPage from './pages/TopPage.vue'
import Login from './pages/Login.vue'
import ProductListsPage from './pages/ProductListsPage.vue'
import SellProductPage from './pages/SellProductPage.vue'

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
    path: '/product-list/:page',
    component: ProductListsPage,
  },
  {
    path: '/sell-product',
    component: SellProductPage,
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router