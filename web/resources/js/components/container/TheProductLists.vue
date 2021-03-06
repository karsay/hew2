<template>
  <ProductLists
    :products="products"
    :isLoading="isLoading"
  />
</template>

<script>
import ProductLists from '../organisms/ProductLists'
import { mapGetters } from 'vuex'

export default {
  components: {
    ProductLists,
  },
  data() {
    return {
      loading: true
    }
  },
  computed: {
    ...mapGetters('search', ['products', 'isLoading'])
  },

}
</script>

<style scoped>

</style>