<template>
  <div>
    <template v-if="isLoading">
    <v-row>
      <v-col
        v-for="i in 5"
        :key="i"
      >
      <LoadingProductCard />
      </v-col>
    </v-row>
    </template>

    <template v-else>
        <v-row>
          <v-col
            class="card_size"
            v-for="product in products"
            :key="product.product_id"
          >
            <ProductCard
              :id="product.product_id"
              :path="`/storage/${product.product_image}`"
              :price="priceAmend(product.product_price)"
              :name="product.product_title"
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
    products: Array,
    isLoading: Boolean
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
  max-width: 20%;
  min-width: 20%;
}
</style>