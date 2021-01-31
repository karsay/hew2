// authStore

const state = {
  // ログイン済みユーザーを保持
  isLoginStatus: null,
  // Api通信の成功、失敗の保持
  apiStatus: null,
  // ログインのエラーメッセージの保持
  loginErrorMessages: null,
  // 登録のエラーメッセージの保持
  registerErrorMessages: null,
}

export default {
  namespaced: true,
  state
}