<template>
  <v-app-bar
    app
    height="116"
    class="primary"
  >
    <v-container>
      <v-row>
        <v-app-bar-nav-icon @click="isDrawer" class="white--text"></v-app-bar-nav-icon>
        <v-spacer></v-spacer>
          <v-toolbar-title @click="toTop" >
            <h1 class="text-h5 white--text title">
              {{ title }}
            </h1>
          </v-toolbar-title>
        <v-spacer></v-spacer>

        <v-app-bar-nav-icon><v-icon class="white--text">mdi-magnify</v-icon></v-app-bar-nav-icon>
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
/*
  - isLoginはvuexから受け取る
*/

export default {
  props: {
    isLoginStatus: Boolean,
  },
  data() {
    return {
      title: 'Relief Market',
      buttons: [
        {
          text: "カテゴリ",
          icon: "mdi-store"
        },
        {
          text: "出品",
          icon: "mdi-camera"
        },
        {
          text: "取引",
          icon: "mdi-message-text"
        },
        
        {
          text: "通知",
          icon: "mdi-bell"
        },
      ]
    }
  },
  methods: {
    isDrawer() {
      this.$emit("is-drawer")
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
}
h1 {
  font-size: 24px;
}
</style>