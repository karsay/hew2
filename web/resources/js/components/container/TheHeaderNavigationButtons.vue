<template>
  <HeaderNavigationButtons
    :notification="notification"
    :isLogin="isLogin"
    @to-sell-product="toSellProduct"
    @to-login="toLogin"
    @logout="logout"
    @to-product-list="toProductList"
    @to-transaction="toTransaction"
  />
</template>

<script>
import HeaderNavigationButtons from '../molecules/HeaderNavigationButtons'
import { mapGetters } from 'vuex'

export default {
  components: {
    HeaderNavigationButtons
  },
  data() {
    return {
      notification: [
        {
          id: 0,
          name: "通知"
        },
        {
          id: 1,
          name: "通知"
        },
      ]
    }
  },
  methods: {
    toSellProduct() {
      this.$router.push({ path: '/sell-product' }).catch(err => {})
    },
    toLogin() {
      this.$router.push({ path: '/login' }).catch(err => {})
    },
    toProductList() {
      this.$router.push({
        name: 'productList',
        params: {
          category: 'search'
        },
        query: {
          keywords: null,
          page: 1
        }
      }).catch(err => {})
    },
    toTransaction() {
      this.$store.dispatch('chat/getUserData', this.userid)
      this.$router.push({
        name: 'transaction'
      })
    },
    async logout () {
      await this.$store.dispatch('auth/logout')
      this.$router.push('/')
    }
  },
  computed: {
    ...mapGetters('auth', ['userid']),
    isLogin () {
      return this.$store.getters['auth/check']
    },
  }
}
</script>

<style scoped>

</style>