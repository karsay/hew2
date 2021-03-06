<template>
  <ProductLists :products="storeProducts" />
</template>

<script>
import ProductLists from '../organisms/ProductLists'

export default {
  components: {
    ProductLists,
  },
  computed: {
    sotreProducts() {
      return this.$store.getters['search/products'].slice(19)
    }
  }
}
</script>

<style scoped>

</style>