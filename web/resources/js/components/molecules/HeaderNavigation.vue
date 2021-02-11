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
        <v-toolbar-title class="white--text">{{ title }}</v-toolbar-title>
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
        >
          <v-icon class="mr-1">{{ button.icon }}</v-icon>
          {{ button.text }}
        </v-btn>
        <v-spacer></v-spacer>
        <v-btn
          v-if="isLoginStatus !== true"
          :depressed="true"
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
    }
  }
}
</script>

<style lang="scss" scoped>
h1 {
  font-size: 24px;
}
</style>