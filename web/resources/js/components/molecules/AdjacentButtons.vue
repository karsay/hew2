<template>
  <v-col class="d-flex px-0 pb-0">
    <v-btn
      min-width="102"
      color="primary"
      class="px-4 py-2"
      @click="onClick"
    >
      {{ buttons.text }}
    </v-btn>

    <v-spacer></v-spacer>

    <v-btn
      min-width="102"
      class="px-4 py-2"
      color="primary"
      text
    >
      キャンセル
    </v-btn>
  </v-col>
</template>

<script>
export default {
  props: {
    buttons: Object
  },
  methods: {
    onClick() {
      this.$emit('on-click')
    },
  },
}
</script>

<style scoped>

</style>