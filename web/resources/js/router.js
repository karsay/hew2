import Vue from 'vue'
import VueRouter from 'vue-router'

import TopPage from './pages/TopPage.vue'
import Login from './pages/Login.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: TopPage
  },
  {
    path: '/login',
    component: Login
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router