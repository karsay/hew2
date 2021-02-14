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
}

const getters = {
  getIsLoginStatus: state => !! state.isLoginStatus
}

export default {
  namespaced: true,
  state,
  getters,
}