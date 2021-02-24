import Vue from 'vue'
import VueRouter from 'vue-router'

import TopPage from './pages/TopPage.vue'
import Login from './pages/Login.vue'
import Register from './pages/Register.vue'
import RegisterForm from './pages/RegisterForm.vue'
import ProductListsPage from './pages/ProductListsPage.vue'
import SellProductPage from './pages/SellProductPage.vue'
import ProductPreviewPage from './pages/ProductPreviewPage.vue'
import ProductPicturePage from './pages/ProductPicturePage.vue'

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
    path: '/register',
    component: Register
  },
  {
    path: '/register-form',
    component: RegisterForm
  },
  {
    path: '/product-list/',
    component: ProductListsPage,
    props: route => {
      const page = route.query.page
      return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 }
    }
  },
  {
    path: '/product-list',
    redirect: '/product-list/?page=1',
  },
  {
    // 720pxなのでsell/urlでform, check->previewに起きたら変える, pictureでわけてもいいかも、、
    path: '/sell-product/form',
    name: 'sell-product',
    component: SellProductPage,
  },
  {
    path: '/sell-product',
    redirect: { name: 'sell-product' }
  },
  {
    path: '/sell-product/preview',
    component: ProductPreviewPage
  },
  {
    path: '/sell-product/picture',
    component: ProductPicturePage
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router