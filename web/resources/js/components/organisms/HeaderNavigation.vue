<template>
  <v-app-bar
    app
    height="116"
    class="primary"
  >
    <v-container>
      <v-row>
        <v-app-bar-nav-icon @click="isDrawer(drawer)" class="white--text"></v-app-bar-nav-icon>
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
          v-if="isLogin"
          :depressed="true"
          @click="logout"
          class="secondary"
        >
          <v-icon
            class="mr-1"
          >mdi-logout</v-icon>
          ログアウト
        </v-btn>
        <v-btn
          v-else
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
export default {
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
    },
    async logout () {
      await this.$store.dispatch('auth/logout')
      this.$router.push('/')
    }
  },
  computed: {
    isLogin () {
      return this.$store.getters['auth/check']
    },
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