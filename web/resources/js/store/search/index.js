// search

const state = {
  input: '',
  isLoading: true,
  pageSize: 20,
  length: 1,
  products: [],
  showProducts: [],
}

const getters = {
  products: state => state.products,
  showProducts: state => state.showProducts,
  length: state => state.length,
  isLoading: state => state.isLoading
}

const mutations = {
  setPage(state, pageNumber) {
    state.showProducts = state.products.slice(
      state.pageSize * (pageNumber -1),
      state.pageSize * (pageNumber)
    )
  },
  setPageLength(state, productsLength) {
    state.length = Math.ceil(productsLength / state.pageSize)
  },
  setIsLoading(state, bool) {
    state.isLoading = bool
  },
  setInput(state, keywords) {
    state.input = keywords
  },
  setProducts(state, data) {
    state.products = data
  },
}

const actions = {
  async allProductsSearch({ commit }) {
    commit('setIsLoading', true)
    const res = await axios.get('/api/all-products')
    commit('setPageLength', res.data.length)
    commit('setProducts', res.data)
    commit('setIsLoading', false)
  },
  async search({ commit }, input) {
    commit('setIsLoading', true)
    const res = await axios.post('/api/search', { keywords: input })
    commit('setPageLength', res.data.length)
    commit('setProducts', res.data)
    commit('setIsLoading', false)
  },
  async narrowDownSearch({ commit }, data) {
    commit('setIsLoading', true)
    const res = await axios.post('/api/search/narrow-down', data)
    commit('setPageLength', res.data.length)
    commit('setProducts', res.data)
    commit('setIsLoading', false)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
}