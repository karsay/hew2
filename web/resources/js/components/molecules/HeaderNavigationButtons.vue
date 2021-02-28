<template>
  <v-row>
    <v-menu offset-y>
      <template #activator="{ on }">
        <v-btn
          class="mr-2"
          :depressed="true"
          :class="'primary_light white--text'"
          v-on="on"
        >
          <v-icon class="mr-1">mdi-store</v-icon>
          カテゴリ
        </v-btn>
      </template>
      <v-list
        nav
      >
        <v-list-item
          v-for="item in category"
          :key="item.id"
          @click="toProductList(item.id)"
        >
          {{ item.name }}
        </v-list-item>
      </v-list>
    </v-menu>

    <v-btn
      class="mr-2"
      :depressed="true"
      :class="'primary_light white--text'"
      @click="toSellProduct"
    >
      <v-icon class="mr-1">mdi-camera</v-icon>
      出品
    </v-btn>

    <v-btn
      class="mr-2"
      :depressed="true"
      :class="'primary_light white--text'"
      @click="toSellProduct"
    >
      <v-icon class="mr-1">mdi-message-text</v-icon>
      取引
    </v-btn>

    <v-menu offset-y>
      <template #activator="{ on }">
        <v-btn
          class="mr-2"
          :depressed="true"
          :class="'primary_light white--text'"
          v-on="on"
        >
          <v-icon class="mr-1">mdi-bell</v-icon>
          通知
        </v-btn>
      </template>
      <v-list
        nav
      >
        <v-list-item
          v-for="item in notification"
          :key="item.id"
          @click="test(item.name)"
        >
          {{ item.name }}
        </v-list-item>
      </v-list>
    </v-menu>

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
</template>

<script>
export default {
  props: {
    category: Array,
    notification: Array,
    isLogin: Boolean,
  },
  data() {
    return {
      isNotification: false,
      isCategory: false,
    }
  },
  methods: {
    toLogin() {
      this.$emit('to-login')
    },
    toSellProduct() {
      this.$emit('to-sell-product')
    },
    logout() {
      this.$emit('logout')
    },
    test(value) {
      console.log(value);
    },
    toProductList(categoryId) {
      this.$emit('to-product-list', categoryId)
    }
  },
}
</script>

<style scoped>

</style>