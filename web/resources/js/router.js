import Vue from 'vue'
import VueRouter from 'vue-router'

import TopPage from './pages/TopPage.vue'
import Login from './pages/Login.vue'
import Register from './pages/Register.vue'
import RegisterForm from './pages/RegisterForm.vue'
import ProductListsPage from './pages/ProductListsPage.vue'
import ProductDetailPage from './pages/ProductDetailPage.vue'
import BuyPhasePage from './pages/BuyPhasePage.vue'
import SellProductPage from './pages/SellProductPage.vue'
import ProductPreviewPage from './pages/ProductPreviewPage.vue'
import ProductPicturePage from './pages/ProductPicturePage.vue'
import ProductsTransactionPage from './pages/ProductsTransactionPage.vue'

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
    path: '/transaction/',
    name: 'transaction',
    component: ProductsTransactionPage
  },
  {
    path: '/product-list/:category',
    name: 'productList',
    component: ProductListsPage,
    props: route => {
      const page = route.query.page
      return {
        keywords: route.query.keywords,
        page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1,
        category: route.params.categoryId
      }
    },
  },
  {
    path: '/product-list/:product/detail',
    name: 'productDetail',
    component: ProductDetailPage,
    props: route => ({
      product: route.params.productId,
    }),
  },
  {
    path: `/product-list/:product/detail/buy`,
    name: 'buy',
    component: BuyPhasePage,
    props: route => ({
      details: route.params.details
    })
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
  scrollBehavior () {
    return { x: 0, y: 0}
  },
  routes
})

export default router
