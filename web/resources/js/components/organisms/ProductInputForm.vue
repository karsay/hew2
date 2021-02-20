<template>
  <v-card class="px-4 py-6">
    <v-text-field
      v-for="inputItem in inputItems"
      :key="inputItem.prop"
      :label="inputItem.label"
      :type="inputItem.type"
      v-model="inputItem.value"
      outlined
      @blur="setInputItems(inputItem.prop, inputItem.value)"
    ></v-text-field>
    <v-textarea
      :label="textareaItem.label"
      v-model="textareaItem.value"
      outlined
      @blur="setInputItems(textareaItem.prop, textareaItem.value)"
    >
    </v-textarea>
  </v-card>
</template>

<script>

export default {
  props: {
    inputItems: Array,
    textareaItem: Object
  },
  methods: {
    setInputItems(prop, value) {
      this.$emit('set-input-items', { prop, value })
    },
  },
}
</script>

<style scoped>

</style>