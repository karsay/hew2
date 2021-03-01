import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import userInfo from './userInfo'
import sellProduct from './sellProduct'
import productStatus from  './productStatus'
import navigation from './navigation'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    auth,
    userInfo,
    sellProduct,
    productStatus,
    navigation,
  }
})

export default store