<template>
  <v-card
    height="238"
    tile
  >
    <v-img
      height="152"
      :src="path"
      :alt="name"
      @click="toDetail"
    ></v-img>

    <v-card-subtitle class="pa-2 text--primary d-flex">
      <v-card-text class="pa-0 d-flex my-auto">
        {{ price }}yen
      </v-card-text>
      <v-card-text class="pa-0 text-right">
        <TheToggleHeart />
      </v-card-text>
    </v-card-subtitle>
    <v-card-title class="pt-0 pl-2 pb-2">
      {{ name }}
    </v-card-title>
  </v-card>
</template>

<script>
import TheToggleHeart from '../container/TheToggleHeart'
// 商品カード

export default {
  components: { TheToggleHeart },
  props: {
    id: Number,
    path: String,
    price: String,
    name: String,
  },
  data() {
    return {
      productId: this.id
    }
  },
  methods: {
    toDetail() {
      this.$router.push({
        name: 'productDetail',
        params: {
          product: this.productId
        }
      })
    },
  },
}
</script>

<style lang="scss" scoped>

</style>