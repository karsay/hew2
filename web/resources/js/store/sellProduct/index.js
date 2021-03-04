// sellProduct

// formの値を変更するときのmutationを定義するstateの取得変更はすべてstoreでやったほうがいい？？

const state = {
  flag: false,
  imageItems: {
    image_path1:'',
    image_path2:'',
    image_path3:''
  },
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
  getImageItem: state => (
    state.imageItems
  ),
  getSelectItem: state => (
    state.selectItems
  ),
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
  setImageItems: (state, { prop, value }) => {
    state.imageItems[prop] = value
  },
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