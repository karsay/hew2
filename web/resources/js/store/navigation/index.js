// Navigation

const state = {
  drawer: false
}

const getters = {
  getDrawer: state => state.drawer
}

const mutations = {
  isDrawer: (state, payload) => {
    state.drawer = payload
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations
}