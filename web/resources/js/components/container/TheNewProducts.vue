<template>
  <v-row>
    <v-col
      v-for="product in products"
      :key="product.id"
    >
      <ProductCard
        :id="product.id"
        :path="product.path"
        :price="product.price"
        :name="product.name"
      />
    </v-col>
  </v-row>
</template>

<script>
import ProductCard from './../molecules/ProductCard'
// 新着アイテム

export default {
  components: { ProductCard },
  data() {
    return {
      products: [
        {
          id: "01",
          path: '',
          price: "1,000",
          name: '商品名'
        },
        {
          id: "02",
          path: '',
          price: "1,000",
          name: '商品名'
        },
        {
          id: "03",
          path: '',
          price: "1,000",
          name: '商品名'
        },
        {
          id: "04",
          path: '',
          price: "1,000",
          name: '商品名'
        },
        {
          id: "05",
          path: '',
          price: "1,000",
          name: '商品名'
        },
      ],
    }
  },
}
</script>

<style scoped>

</style>