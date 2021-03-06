<template>
  <ProductSearch
    :input="input"
    @input-handle="inputHandle"
    @search="search"
  />
</template>

<script>
import ProductSearch from '../molecules/ProductSearch'

export default {
  components: { ProductSearch },
  data() {
    return {
      input: ''
    }
  },
  methods: {
    async search(keywords) {
      // apiで商品を検索
      // console.log('keywords', this.input)
      await this.$router.push({
        name: 'productList',
        params: {
          category: 'search'
        },
        query: {
          keywords: this.input,
          page: 1
        }
      })
      this.$store.dispatch('search/search', keywords)
      this.input = ''
    },
    inputHandle(input) {
      this.input = input
    }
  },
}
</script>

<style scoped>

</style>