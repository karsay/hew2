<template>
  <!-- <v-row>
    <template v-if="isLoading">
      <v-col
        v-for="i in 5"
        :key="i"
      >
      <LoadingProductCard />
      </v-col>
    </template> -->

    <!-- <template v-else> -->
      <div>
        <v-row
          v-for="i in 5"
          :key="i"
        >
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
      </div>
    <!-- </template>
  </v-row> -->
</template>

<script>
import ProductCard from '../molecules/ProductCard'
// import LoadingProductCard from '../molecules/LoadingProductCard'

export default {
  components: {
    ProductCard,
    // LoadingProductCard
  },
  props: {
    products: Array,
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