<template>
  <v-app-bar
    app
    height="116"
    class="primary"
  >
    <v-container>
      <v-row>
        <v-col cols="4" class="pa-0 d-flex">
          <v-app-bar-nav-icon
            @click="isDrawer(drawer)"
            class="white--text my-auto"
            ></v-app-bar-nav-icon>
        </v-col>
        <v-col cols="4" class="pa-0 d-flex">
          <v-toolbar-title class="ma-auto" @click="toTop" >
            <h1 class="text-h5 my-auto white--text title">
              {{ title }}
            </h1>
          </v-toolbar-title>
        </v-col>
        <v-col cols="4" class="pa-0 d-flex">
          <v-toolbar-items class="my-auto ml-auto">
            <TheProductSearch />
          </v-toolbar-items>
        </v-col>
      </v-row>
      <TheHeaderNavigationButtons />
    </v-container>
  </v-app-bar>
</template>

<script>
import TheProductSearch from '../container/TheProductSearch'
import TheHeaderNavigationButtons from '../container/TheHeaderNavigationButtons'

export default {
  components: {
    TheProductSearch,
    TheHeaderNavigationButtons
  },
  props: {
    title: String,
    drawer: Boolean
  },
  methods: {
    isDrawer(bool) {
      this.$emit("is-drawer", !bool)
    },
    toTop() {
      this.$emit('to-top')
    },
  },
}
</script>

<style lang="scss" scoped>
.title {
  cursor: pointer;
  text-align: center;
}
h1 {
  font-size: 24px;
}
</style>