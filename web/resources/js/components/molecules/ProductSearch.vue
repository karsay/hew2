<template>
  <v-text-field
    hide-details
    dark
    class="shrink white--text"
    color="primary_dark"
    background-color="primary_light primary_dark--text px-2"
    prepend-inner-icon="mdi-magnify white--text"
    clearable
    clear-icon="mdi-close white--text"
    :value="input"
    @change="inputHandle"
    @keyup.enter="search"
  >
  </v-text-field>
</template>

<script>
export default {
  props: {
    input: String
  },
  methods: {
    search() {
      this.$emit('search')
    },
    inputHandle(e) {
      this.$emit('input-handle', e)
    }
  },
}
</script>

<style lang="scss" scoped>
</style>