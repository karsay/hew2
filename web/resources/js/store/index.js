import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import userInfo from './userInfo'
import chat from './chat'
import sellProduct from './sellProduct'
import productStatus from  './productStatus'
import search from './search'
import navigation from './navigation'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    auth,
    userInfo,
    chat,
    sellProduct,
    productStatus,
    search,
    navigation,
  }
})

export default store