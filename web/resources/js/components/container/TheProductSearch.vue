<template>
  <ProductSearch
    @on-submit="onSubmit"
  />
</template>

<script>
import ProductSearch from '../molecules/ProductSearch'

export default {
  components: { ProductSearch },
  methods: {
    onSubmit(keywords) {
      // apiで商品を検索
      console.log('keywords', keywords)
    },
  },
}
</script>

<style scoped>

</style>