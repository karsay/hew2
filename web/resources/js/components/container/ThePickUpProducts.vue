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
        v-for="product in pickUpProduct.product"
        :key="product.id"
        class="py-0"
      >
        <ProductCard
          :id="product.id"
          :path="product.path"
          :price="product.price"
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
              id: "11",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "12",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "13",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "14",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "15",
              path: '',
              price: '1,000',
              name: '商品名',
            },
          ]
        },
        {
          id: 2,
          category: 'カテゴリ2',
          product: [
            {
              id: "21",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "22",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "23",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "24",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "25",
              path: '',
              price: '1,000',
              name: '商品名',
            },
          ]
          
        },
        {
          id: 3,
          category: 'カテゴリ3',
          product: [
            {
              id: "31",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "32",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "33",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "34",
              path: '',
              price: '1,000',
              name: '商品名',
            },
            {
              id: "35",
              path: '',
              price: '1,000',
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