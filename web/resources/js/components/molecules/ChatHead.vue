<template>
  <v-toolbar color="primary_dark" height="72" dark>
    <!-- <div class="py-6 d-flex"> -->
      <v-avatar
        size="48"
        color="white"
      >
      </v-avatar>
      <v-toolbar-title class="ml-6">
        {{ name }}
      </v-toolbar-title>

    <!-- </div> -->
  </v-toolbar>
</template>

<script>
export default {
  data() {
    return {
      name: 'userName'
    }
  }
}
</script>

<style scoped>
</style>