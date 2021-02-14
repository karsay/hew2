import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import userInfo from './userInfo'
import sellProduct from './sellProduct'
import navigation from './navigation'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    auth,
    userInfo,
    sellProduct,
    navigation,
  }
})

export default store