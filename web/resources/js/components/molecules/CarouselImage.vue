<template>
  <v-carousel v-model="model" hide-delimiter-background hide-delimiters>
    <v-carousel-item
      v-for="(image, i) in images"
      :key="i"
      :src="image"
      fixed
      width="100%"
      class="img"
    >
    </v-carousel-item>
  </v-carousel>
</template>

<script>
export default {
  props: {
    images: Array
  },
  data() {
    return {
      model: 0,
    }
  },
}
</script>

<style scoped>
.img {
  background-color: #ddd;
}
</style>