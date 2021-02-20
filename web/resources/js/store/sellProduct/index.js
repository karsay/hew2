// sellProduct

// formの値を変更するときのmutationを定義するstateの取得変更はすべてstoreでやったほうがいい？？

const state = {
  selectItems: {
    category: '',
    state: '',
    shippingCost: '',
    shippingFrom: '',
    shippingDays: ''
  },
  inputItems: {
    name: 'aaa',
    price: 0,
    detail: '',
  }
}

const getters = {
  getSelectItem: state => (
    state.selectItems
  ),
  getInputItems: state => (
    state.inputItems
  ),
}

const mutations = {
  setSelectItems: () => {},
  setSellProductData: (state, productData) => {
    state = {
      ...state,
      ...productData
    }
    // state.productData = {
    //   ...state.productData,
    //   ...productData
    // }
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations
}