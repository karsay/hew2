<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" color="#fafafa" class="px-6 mt-10">
      <div class="text-h4">プロフィール</div>
      <v-row class="pt-6">
        <v-col cols="6">
          <TheUserProfile />
        </v-col>

        <v-col cols="6">
          <TheUserProfile />
        </v-col>
      </v-row>
      <v-divider class="my-10"></v-divider>
      <div class="text-h4">購入した商品</div>
      <v-divider></v-divider>
      <div class="text-h4">出品した商品</div>
    </v-sheet>
  </v-container>
</template>

<script>
import TheUserProfile from '../components/container/TheUserProfile'


export default {
  components: { TheUserProfile },
  
}
</script>

<style scoped>

</style>