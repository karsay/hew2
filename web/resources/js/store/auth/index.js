// authStore

const state = {
  // ログイン済みユーザーを保持
  isLoginStatus: true,
  // Api通信の成功、失敗の保持
  apiStatus: null,
  // ログインのエラーメッセージの保持
  loginErrorMessages: null,
  // 登録のエラーメッセージの保持
  registerErrorMessages: null,

  user: null
}

const mutations = {
  setUser (state, user) {
    state.user = user
  }
}

const actions = {
  async register (context, data) {
    const response = await axios.post('/api/register', data)
    context.commit('setUser', response.data)
  },
  async login (context, data) {
    const response = await axios.post('/api/login', data)
    context.commit('setUser', response.data[0])
  },

  async logout (context) {
    const response = await axios.post('/api/logout')
    context.commit('setUser', null)
  },
  async currentUser (context) {
    const response = await axios.get('/api/user')
    const user = response.data || null
    context.commit('setUser', user)
  }
}

const getters = {
  // getIsLoginStatus: state => !! state.isLoginStatus,
  check: state => !! state.user,
  username: state => state.user ? state.user.users_name : ''
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}