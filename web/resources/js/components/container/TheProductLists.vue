<template>
  <ProductLists
    :products="showProducts"
    :isLoading="isLoading"
  />
</template>

<script>
import ProductLists from '../organisms/ProductLists'
import { mapGetters, mapMutations } from 'vuex'

export default {
  components: {
    ProductLists,
  },
  data() {
    return {
      loading: true
    }
  },
  methods: {
    ...mapMutations('search', ['setPage']),
    firstPage(num) {
      this.setPage(num)
    },
  },
  computed: {
    ...mapGetters('search', ['showProducts', 'isLoading']),
  },
  watch: {
    isLoading() {
      if (this.isLoading == false) { this.firstPage(1) }
    },
  },
  created() {
    this.$store.dispatch('search/allProductsSearch')
  }
}
</script>

<style scoped>

</style>