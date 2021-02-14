<template>
  <div>
    <v-row
      v-for="pickUpProduct in pickUpProducts"
      :key="pickUpProduct.id"
      class="pt-0 mb-6"
    >
    <v-card-text class="pb-1 pl-3">
      {{ pickUpProduct.category }}
    </v-card-text>
      <v-col
        v-for="(product, i) in pickUpProduct.product"
        :key="i"
        class="py-0"
      >
        <ProductCard
          :path="product.path"
          :price="product.price"
          :like-value="product.likeValue"
          :name="product.name"
        />
      </v-col>
    </v-row>

  </div>
</template>

<script>
import ProductCard from './../molecules/ProductCard'

// pickUpアイテム

export default {
  components: { ProductCard },
  data() {
    return {
      pickUpProducts: [
        {
          id: 1,
          category: 'カテゴリ1',
          product: [
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
          ]
        },
        {
          id: 2,
          category: 'カテゴリ2',
          product: [
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
          ]
          
        },
        {
          id: 3,
          category: 'カテゴリ3',
          product: [
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
            {
              path: '',
              price: '1,000',
              likeValue: 33,
              name: '商品名',
            },
          ]
        },
      ],
    }
  },
}
</script>

<style scoped>

</style>