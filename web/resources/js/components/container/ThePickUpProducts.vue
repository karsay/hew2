<template>
  <div>
    <template v-if="isLoading">
      <v-row class="pt-0 mb-6">
        <v-col
          v-for="i in 5"
          :key="i"
        >
        <LoadingProductCard />
        </v-col>
      </v-row>
    </template>

    <template v-else>
      <v-row
        v-for="pickUpProduct in pickUpProducts"
        :key="pickUpProduct.category_name"
        class="pt-0 mb-6"
      >
      <v-card-text class="pb-1 pl-3">
        {{ pickUpProduct.category_name }}
      </v-card-text>
        <v-col
          v-for="product in pickUpProduct.products"
          :key="product.product_id"
          class="py-0"
        >
          <ProductCard
            :id="product.product_id"
            :path="''"
            :price="priceAmend(product.product_price)"
            :name="'商品名'"
          />
        </v-col>
      </v-row>
    </template>

  </div>
</template>

<script>
import ProductCard from '../molecules/ProductCard'
import LoadingProductCard from '../molecules/LoadingProductCard'

export default {
  components: {
    ProductCard,
    LoadingProductCard
  },
  props: {
    isLoading: Boolean,
    pickUpProducts: Array
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

</style>