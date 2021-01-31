import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import userInfo from './userInfo'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    auth,
    userInfo
  }
})

export default store