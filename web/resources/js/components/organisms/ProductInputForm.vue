<template>
  <v-card class="px-4 py-6">
    <v-text-field
      v-for="inputItem in inputItems"
      :key="inputItem.label"
      :label="inputItem.label"
      outlined
    ></v-text-field>
    <v-textarea
      label="商品説明"
      outlined
    >
    </v-textarea>
  </v-card>
</template>

<script>

export default {
  props: {
    inputItems: Array
  }
}
</script>

<style scoped>

</style>