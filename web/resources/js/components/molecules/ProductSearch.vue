<template>
  <v-text-field
    hide-details
    class="shrink white--text"
    prepend-inner-icon="mdi-magnify white--text"
    clear-icon="mdi-close white--text"
    clearable
    background-color="primary_light primary_dark--text px-2"
    color="primary_dark"
    v-model="input"
    @keydown="({ keyCode }) => onSubmit(keyCode)"
  >
  </v-text-field>
</template>

<script>
  export default {
    data() {
      return {
        input: ''
      }
    },
    methods: {
      onSubmit(keyCode) {
        keyCode === 13 && this.$emit('on-submit', this.input)
      },
    },
  }
</script>

<style lang="scss" scoped>
</style>