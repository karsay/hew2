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
    search() {
      // apiで商品を検索
      this.$router.push({
        name: 'productList',
        params: {
          category: 'search'
        },
        query: {
          keywords: this.input,
          page: 1
        }
      })
      this.$store.dispatch('search/search', this.input)
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