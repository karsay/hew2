// search

const state = {
  input: '',
  isLoading: true,
  errorMessage: null,
  narrowDownData: {},
  products: []
}

const getters = {
  products: state => state.products.slice(0, 20),
  isLoading: state => state.isLoading
}

const mutations = {
  setIsLoading(state, bool) {
    state.isLoading = bool
  },

  setInput(state, keywords) {
    state.input = keywords
  },
  setProducts(state, data) {
    state.products = data
  },
  setNarrowDownData(state, keys) {
    state.narrowDownData = keys
  }
}

const actions = {
  async search({ commit }, input) {
    commit('setIsLoading', true)
    const res = await axios.post('/api/search', { keywords: input })
    const payloadData = res.data
    commit('setIsLoading', false)
    commit('setProducts', payloadData)
  },
  async narrowDownSearch({ commit }, data) {
    console.log(data)
    commit('setIsLoading', true)
    const res = await axios.post('/api/search/narrow-down', data)
    const payloadData = res.data
    commit('setProducts', payloadData)
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