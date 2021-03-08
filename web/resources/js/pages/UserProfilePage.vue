<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" color="#fafafa" class="px-6 mt-10">
      <div class="text-h4">プロフィール</div>
      <v-row class="pt-6">
        <v-col cols="6">
          <TheUserProfile />
        </v-col>

        <v-col cols="6">
          <TheNoticeFromOperation />
        </v-col>
      </v-row>
      <v-divider class="my-10"></v-divider>
      <div class="text-h4">購入した商品</div>
        <v-row>
          <v-col cols="12">
            <BoughtProduct />
          </v-col>
        </v-row>
      <v-divider class="my-10"></v-divider>
      <div class="text-h4">出品した商品</div>
      <v-row>
        <v-col cols="12">
          <SoldProduct />
        </v-col>
      </v-row>
    </v-sheet>
  </v-container>
</template>

<script>
import TheUserProfile from '../components/container/TheUserProfile'
import TheNoticeFromOperation from '../components/container/TheNoticeFromOperation'
import BoughtProduct from '../components/organisms/BoughtProduct.vue'
import SoldProduct from '../components/organisms/SoldProduct'

import { mapGetters } from 'vuex'


export default {
  components: {
    TheUserProfile,
    TheNoticeFromOperation,
    BoughtProduct,
    SoldProduct
  },
  computed: {
    ...mapGetters('auth', ['userid']),
  },
  created() {
    this.$store.dispatch('chat/getUserData', this.userid)
  }
  
}
</script>

<style scoped>

</style>