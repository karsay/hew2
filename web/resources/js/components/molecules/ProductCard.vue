<template>
  <v-card
    height="238"
    tile
  >
    <v-img
      height="152"
      :src="path"
      :alt="name"
    ></v-img>

    <v-card-subtitle class="pa-2 text--primary d-flex justify-space-between">
      <v-card-text class="pa-0">
        {{ price }}yen
      </v-card-text>
      <v-card-text class="pa-0 text-right">
        <v-icon medium>mdi-heart</v-icon>
          {{ likeValue }}
      </v-card-text>
    </v-card-subtitle>
    <v-card-title class="pt-0 pl-2 pb-2">
      {{ name }}
    </v-card-title>
  </v-card>
</template>

<script>
// 商品カード

export default {
  props: {
    path: String,
    price: String,
    likeValue: Number,
    name: String,
  }
}
</script>

<style lang="scss" scoped>

</style>