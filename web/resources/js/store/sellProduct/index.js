// sellProduct

// formの値を変更するときのmutationを定義するstateの取得変更はすべてstoreでやったほうがいい？？

const state = {
  flag: false,
  selectItems: {
    category: '',
    state: '',
    shippingCost: '',
    shippingFrom: '',
    shippingDays: ''
  },
  inputItems: {
    name: '',
    price: '',
    description: '',
  }
}

const getters = {
  getSelectItem: state => (
    state.selectItems
  ),
  getInputItems: state => (
    state.inputItems
  ),
  getProductItems: state => (
    {
      ...state.selectItems,
      ...state.inputItems
    }
  )
}

const mutations = {
  setSelectItems: (state, { prop, selected }) => {
    state.selectItems[prop] = selected
  },
  setInputItems: (state, { prop, value }) => {
    value = prop == 'price' ?
    String(value).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,') : value
    state.inputItems[prop] = value
  },
  isFlag: state => {
    state.flag = !state.flag
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations
}