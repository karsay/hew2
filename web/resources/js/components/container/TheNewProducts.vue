<template>
  <v-row>
    <template v-if="isLoading">
      <v-col
        v-for="i in 5"
        :key="i"
      >
      <LoadingProductCard />
      </v-col>
    </template>

    <template v-else>
      <v-col
        class="card_size"
        v-for="product in newProducts"
        :key="product.product_id"
      >
        <ProductCard
          :id="product.product_id"
          :path="''"
          :price="priceAmend(product.product_price)"
          :name="product.product_title"
        />
      </v-col>
    </template>
  </v-row>
</template>

<script>
import ProductCard from './../molecules/ProductCard'
import LoadingProductCard from '../molecules/LoadingProductCard'
// 新着アイテム

export default {
  components: {
    ProductCard,
    LoadingProductCard
  },
  props: {
    isLoading: Boolean,
    newProducts: Array,
  },
  methods: {
    priceAmend(price) {
      const formatter = new Intl.NumberFormat('ja-JP')
      return formatter.format(price)
    },
  },
}
</script>

<style scoped>
.card_size {
  width: calc(100% / 5);
}
</style>