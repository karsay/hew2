// search

const state = {
  input: '',
  errorMessage: null,
  narrowDownData: {},
  products: []
}

const getters = {
  products:state => state.products
}

const mutations = {
  setInput({ input }, keywords) {
    input = keywords
  },
  setProducts(state, data) {
    state.products = data
  },
  setNarrowDownData({ narrowDownData }, keys) {
    narrowDownData = keys
  }
}

const actions = {
  async search({ commit }, keywords) {
    const res = await axios.post('/api/search', keywords)
    commit('setProducts', res.data)
  },
  async narrowDownSearch({ commit }, data) {
    const res = await axios.post('/search/narrow-down', data)
    commit('setProducts', res.data)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
}