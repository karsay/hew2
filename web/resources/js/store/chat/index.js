// chat

const state = {
  message: [],
  length: 0,
  steps: [
    { id: 1, state: '商品を発送' },
    { id: 2, state: '商品の受取' },
    { id: 3, state: '出品者を評価' },
  ],
  productDetail: {
    "product_id": 23,
    "user_id": 4,
    "product_title": "手回し発電搭載　多機能防災時計",
    "product_description": "災害用の手回し充電の多機能防災時計です。　ライトも付いてます。",
    "product_state": 3,
    "product_shipping_fee": 4,
    "product_area": 0,
    "product_date": 1,
    "product_price": 1000,
    "user_name": "鈴木 七夏",
    "user_image": "test.jpg",
    "users_profile": "て来くるみだした。ザネリ」といった硝子ガラスの盤ばん幸さいわよ。おや、がたくさんか、そこで降おりました。「今晩こんなもんだのようになって後光ごこうしを下にしかに、早くなり両手りょうているのです」車掌しゃるんで立って立っていました。ければいっさっそく正しくわらを押おさえるのを着きて青じろいろのがぼくたちいのり出され汽車は、なんとは紀元前きげんぜんな不完全ふかくてねむってしまいまま楕円形だえんきり十。",
    "product_image": [
        {
            "image_path": "image17.jpg"
        },
        {
            "image_path": "image18.jpg"
        },
        {
            "image_path": "image19.jpg"
        },
        {
            "image_path": "image20.jpg"
        }
    ],
    "date": "2020-11-16"
  },
  images: []
}

const getters = {
  message: state => state.message,
  productDetail: state => state.productDetail,
  steps: state => state.steps,
  images: state => state.images,
  length: state => state.length,
}

const mutations = {
  setStepState(state, step) {
    state.stepState = step
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