<template>
  <v-card class="px-4 py-6">
    <v-select
      v-for="selectItem in selectItems"
      :key="selectItem.subText"
      :label="selectItem.subText"
      :items="selectItem.item"
      outlined
    >
    </v-select>
  </v-card>
</template>

<script>
export default {
  props: {
    selectItems: Array
  }
}
</script>