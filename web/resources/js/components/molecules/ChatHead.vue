<template>
  <v-toolbar color="primary_dark" max-height="112" min-height="112" dark>
    <v-avatar
      :src="`/storage/${userIcon}`"
      size="48"
      color="white"
    >
    </v-avatar>
      <v-toolbar-title class="ml-6">
        {{ productName }}
      <v-card-subtitle class="pa-0 white--text">
        {{ userName }}
      </v-card-subtitle>
      </v-toolbar-title>

    <template v-slot:extension elevation="2">
      <v-tabs
        :value="tab"
        @change="tabChange"
        class="px-0"
      >
        <v-tabs-slider color="white"></v-tabs-slider>

        <v-tab
          class="tab-size"
          v-for="item in items"
          :key="item.tab"
        >
          {{ item.tab }}
        </v-tab>
      </v-tabs>
    </template>
  </v-toolbar>
</template>

<script>
export default {
  props: {
    userIcon: String,
    tab: Number,
    items: Array,
    productName: String,
    userName: String
  }, 
  methods: {
    tabChange(e) {
      this.$emit('tab-change', e)
    },
  },
}
</script>

<style lang="scss" scoped>

.tab-size {
  margin: 0 auto;
  width: 100%
}
</style>