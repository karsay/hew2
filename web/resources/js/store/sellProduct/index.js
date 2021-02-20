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
    name: 'aaa',
    price: '',
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
  setSelectItems: (state, selectItem) => {
    state.selectItems[selectItem.prop] = selectItem.selected
  },
  setInputItems: (state) => {},
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