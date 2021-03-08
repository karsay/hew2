// chat

const state = {
  message: [],
  userData: [
    // {
    //   date:"2021-02-05",
    //   histories_shipping_state:"1",
    //   likes:0,
    //   product_id:26,
    //   product_image:"image23.jpg",
    //   product_is_selled:1,
    //   product_price:3000,
    //   user_id:43,
    //   user_name:"佐々木 里佳",
    // },
    // {
    //   date:"2020-09-09",
    //   histories_shipping_state:"2",
    //   likes:0,
    //   product_id:24,
    //   product_image:"image21.jpg",
    //   product_is_selled:1,
    //   product_price:500,
    //   user_id:13,
    //   user_name:"斉藤 桃子",
    // },
    // {
    //   date:"2021-02-10",
    //   histories_shipping_state:"3",
    //   likes:0,
    //   product_id:33,
    //   product_image:"IMG-0244.JPG",
    //   product_is_selled:1,
    //   product_price:300,
    //   user_id:23,
    //   user_name:"渡辺 陽子",

    // }
  ],
  selectData: {
    // date:"2021-02-05",
    // histories_shipping_state:"1",
    // likes:0,
    // product_id:26,
    // product_image:"image23.jpg",
    // product_is_selled:1,
    // product_price:3000,
    // user_id:43,
    // user_name:"佐々木 里佳"
  },
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
  message: state => state.message,
  userData: state => state.userData ? state.userData : '',
  selectData: state => state.selectData ? state.selectData : state.userData[0],
  stepState: state => state.selectData ? state.selectData.histories_shipping_state : '',
  productDetail: state => state.productDetail,
  steps: state => state.steps,
  images: state => state.images,
  length: state => state.length,
}

const mutations = {
  setSelectData(state, data) {
    state.selectData = data
  },
  setUserData(state, data) {
    state.userData = data
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
    console.log(data);
    await axios.post('/api/shipping-state/update', { product_id: data.id })
    commit('setStepState', data.step)
  },
  async getUserData({ commit }, id) {
    const res = await axios.post('/api/transition/user-transition', { user_id: id })
    console.log(res.data)
    commit('setUserData', [
      ...res.data[0].buy,
      ...res.data[1].sell,
    ])
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