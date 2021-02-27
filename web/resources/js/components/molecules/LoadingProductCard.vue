<template>
  <v-card
    height="238"
    tile
    :loading="true"
  >
    <v-img
      height="152"
      :src="path"
      :alt="name"
    ></v-img>

    <v-card-subtitle class="pa-2 text--primary d-flex">
      <v-card-text class="pa-0 d-flex my-auto">
        {{ price }}
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

export default {
  components: {
    TheToggleHeart
  },
  props: {
    path: String,
    name: String,
    price: String,
  },
}
</script>