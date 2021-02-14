<template>
  <v-row>
    <v-col
      v-for="(product, i) in products"
      :key="i"
    >
      <ProductCard
        :path="product.path"
        :price="product.price"
        :like-value="product.likeValue"
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
          path: '',
          price: "1,000",
          likeValue: 50,
          name: '商品名'
        },
        {
          path: '',
          price: "1,000",
          likeValue: 50,
          name: '商品名'
        },
        {
          path: '',
          price: "1,000",
          likeValue: 50,
          name: '商品名'
        },
        {
          path: '',
          price: "1,000",
          likeValue: 50,
          name: '商品名'
        },
        {
          path: '',
          price: "1,000",
          likeValue: 50,
          name: '商品名'
        },
      ],
    }
  },
}
</script>

<style scoped>

</style>