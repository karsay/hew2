<template>
  <HeaderNavigation
    :is-login-Status="getIsLoginStatus"
    :title="title"
    :buttons="buttons"
    :drawer="getDrawer"
    @is-drawer="isDrawer"
    @to-top="toTop"
    @to-login="toLogin"
    @to-sell-product="toSellProduct"
  />
</template>

<script>
import HeaderNavigation from './../organisms/HeaderNavigation'
import { mapGetters, mapMutations } from 'vuex'

export default {
  components: {
    HeaderNavigation,
  },
  data() {
    return {
      title: 'Relief Market',
      buttons: [
        {
          text: "カテゴリ",
          icon: "mdi-store"
        },
        {
          text: "出品",
          icon: "mdi-camera"
        },
        {
          text: "取引",
          icon: "mdi-message-text"
        },
        
        {
          text: "通知",
          icon: "mdi-bell"
        },
      ]
    }
  },
  methods: {
    ...mapMutations("navigation", ["isDrawer"]),
    toTop() {
      this.$router.push({ path: '/' })
    },
    toLogin() {
      this.$router.push({ path: '/login' })
    },
    toSellProduct() {
      this.$router.push({ path: '/sell-product' })
    }
  },
  computed: {
    ...mapGetters("auth", ["getIsLoginStatus"]),
    ...mapGetters("navigation", ["getDrawer"]),
  }
}
</script>