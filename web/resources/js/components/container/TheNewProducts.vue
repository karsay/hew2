<template>
  <v-row>
    <template v-if="isLoading">
      <v-col
        v-for="i in 5"
        :key="i"
      >
      <TheLoadingProductCard />
      </v-col>
    </template>

    <template v-else>
      <v-col
        v-for="product in products"
        :key="product.product_id"
      >
        <ProductCard
          :isLoading="isLoading"
          :id="product.product_id"
          :path="''"
          :price="priceAmend(product.product_price)"
          :name="'商品名'"
        />
      </v-col>
    </template>
  </v-row>
</template>

<script>
import ProductCard from './../molecules/ProductCard'
import TheLoadingProductCard from './TheLoadingProductCard'
// 新着アイテム

export default {
  components: {
    ProductCard,
    TheLoadingProductCard
  },
  data() {
    return {
      isLoading: true,
      products: []
    }
  },
  methods: {
    priceAmend(price) {
      const formatter = new Intl.NumberFormat('ja-JP')
      return formatter.format(price)
    },
  },
  created: async function() {
    await axios.get('api/topProducts')
    .then(res => {
      this.products = res.data[0].newProducts
      this.isLoading = false
    })
    .catch(err => (
      console.log(err.message)
    ))
  },
}
</script>

<style scoped>

</style>