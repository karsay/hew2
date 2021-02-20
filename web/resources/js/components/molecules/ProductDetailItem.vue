<template>
  <div>
    <v-card-subtitle class="pa-0">
      <p class="ma-0">{{ label }}</p>
    </v-card-subtitle>
    <v-card-text class="pb-2 px-0">
      <p class="ma-0 text-h6 card__text">{{ productItem }}</p>
    </v-card-text>
  </div>
</template>

<script>
export default {
  props: {
    label: String,
    productItem: String
  },
}
</script>

<style lang="scss" scoped>
.card__text {
  border-bottom: solid 1px rgba($color: #000, $alpha: .37);
}
</style>