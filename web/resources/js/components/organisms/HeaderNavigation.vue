<template>
  <v-app-bar
    app
    height="116"
    class="primary"
  >
    <v-container>
      <v-row
      >
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
      <v-row>
        <v-btn
          class="mr-2"
          v-for="button in buttons"
          :key="button.text"
          :depressed="true"
          :class="'primary_light white--text'"
          @click="toSellProduct"
        >
          <v-icon class="mr-1">{{ button.icon }}</v-icon>
          {{ button.text }}
        </v-btn>
        <v-spacer></v-spacer>
        <v-btn
          v-if="isLoginStatus !== true"
          :depressed="true"
          @click="toLogin"
          class="secondary"
        >
          <v-icon
            class="mr-1"
          >mdi-account</v-icon>
          ログイン/新規登録
        </v-btn>
      </v-row>
    </v-container>
  </v-app-bar>
</template>

<script>
import TheProductSearch from '../container/TheProductSearch'

export default {
  components: { TheProductSearch },
  props: {
    isLoginStatus: Boolean,
    title: String,
    buttons: Array,
    drawer: Boolean
  },
  methods: {
    isDrawer(bool) {
      this.$emit("is-drawer", !bool)
    },
    toTop() {
      this.$emit('to-top')
    },
    toLogin() {
      this.$emit('to-login')
    },
    toSellProduct() {
      this.$emit('to-sell-product')
    }
  }
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