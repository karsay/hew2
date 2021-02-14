// sellProduct

// formの値を変更するときのmutationを定義するstateの取得変更はすべてstoreでやったほうがいい？？

const state = {
  productData: {
    name: 'aaa',
    price: 0,
    state: '',
    shippingCost: '',
    shippingFrom: '',
    shippingDays: 0,
    detail: ''
  },
}

const getters = {
  getSellProductData: state => (
    state.productData
  )
}

const mutations = {
  setSellProductData: (state, productData) => {
    state.productData = {
      ...state.productData,
      ...productData
    }
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations
}