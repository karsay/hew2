// chat

const state = {
  message: [],
  userData: [
  ],
  selectData: {
  },
  boughtProduct: [],
  soldProduct: [],
  length: 0,
  stepState: '1',
  steps: [
    { id: 1, state: '商品を発送' },
    { id: 2, state: '商品の受取' },
    { id: 3, state: '出品者を評価' },
  ],
  images: []
}

const getters = {
  tradingProduct: state => (
    state.boughtProduct ? state.boughtProduct.filter(({ histories_shipping_state }) => (
      histories_shipping_state !== "3"
    )) : []
  ),
  tradedProduct: state => (
    state.boughtProduct ? state.boughtProduct.filter(({ histories_shipping_state }) => (
      histories_shipping_state === "3"
    )) : []
  ),
  inProduction: state => (
    state.soldProduct ? state.soldProduct.filter(({ histories_shipping_state }) => (
      histories_shipping_state === "0"
    )) : []
  ),
  productionInProgress: state => (
    state.soldProduct ? state.soldProduct.filter(({ histories_shipping_state }) => (
      histories_shipping_state === "1" || histories_shipping_state === "2"
    )) : []
  ),
  afterProduction: state => (
    state.soldProduct ? state.soldProduct.filter(({ histories_shipping_state }) => (
      histories_shipping_state === "3"
    )) : []
  ),
  userName: state => state.selectData ? state.selectData.user_name : '',
  userIcon: state => state.selectData ? state.selectData.user_image : '',
  productName: state => state.selectData ? state.selectData.product_name : '',
  message: state => state.message,
  userData: state => state.userData ? state.userData : '',
  selectData: state => state.selectData,
  stepState: state => state.selectData ? state.selectData.histories_shipping_state : '',
  productDetail: state => state.productDetail,
  steps: state => state.steps,
  images: state => state.images,
  length: state => state.length,
}

const mutations = {
  setBoughtProduct(state, data) {
    state.boughtProduct = data ? data : []
  },
  setSoldProduct(state, data) {
    state.soldProduct = data ? data : []
  },
  setSelectData(state, data) {
    state.selectData = data
  },
  setUserData(state, data) {
    state.userData = data
    state.selectData = data[0]
  },
  setStepState(state, step) {
    state.selectData.histories_shipping_state = step
  },
  setImages(state, images) {
    state.images = images
  },
  setProductDetail(state, detail) {
    state.productDetail = detail
  },
  setMessage(state, message) {
    state.message = [
      ...message
    ]
    state.length = message.length
  }
}

const actions = {
  async updateShippingState({ commit }, data) {
    await axios.post('/api/shipping-state/update', { product_id: data.id })
    commit('setStepState', data.step)
  },
  async getUserData({ commit }, id) {
    const res = await axios.post('/api/transition/user-transition', { user_id: id })
    commit('setUserData', [
      ...res.data[0].buy,
      ...res.data[1].sell,
    ])
    commit('setBoughtProduct', [...res.data[0].buy])
    commit('setSoldProduct', [...res.data[1].sell])
  },
  async getProductDetail({ commit }, productId) {
    const res = await axios.get(`/api/products/${productId}`)
    const data = res.data
    commit('setProductDetail', data)
    commit('setImage', data.images)
  },
  async sendMessage({ commit, getters }, message) {
    const sendMessage = [
      {
        id: getters.length,
        message: message
      }
    ]

    if (localStorage.getItem('chat') === null) {
      // localStorageに値がない場合
      localStorage.setItem('chat', JSON.stringify(sendMessage))
      const chat = await JSON.parse(localStorage.getItem('chat'))
      commit('setMessage', chat)
    } else {
      // localStorageに値がある場合
      const chat = await JSON.parse(localStorage.getItem('chat'))
      const updataChat = [
        ...chat,
        ...sendMessage
      ]
      console.log(updataChat);
      localStorage.setItem('chat', JSON.stringify(updataChat))
      commit('setMessage', updataChat)
    }
    
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}