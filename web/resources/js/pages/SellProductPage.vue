<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" color="#fafafa" class="px-6 mt-10">
      <h4 class="text-h4">商品情報入力フォーム</h4>
      <h5 class="mt-10 text-h5">商品を撮影する</h5>

      <TheProductImgList />

      <v-divider class="my-10"></v-divider>

      <h5 class="mb-6 text-h5">商品情報を入力する</h5>
      <v-row>
        <v-col cols="6">
          <TheProductSelectForm />
        </v-col>

        <v-col cols="6">
          <TheProductInputForm />

          <TheSellProductActions />
        </v-col>
      </v-row>

    </v-sheet>
  </v-container>
</template>

<script>
import TheProductImgList from '../components/container/TheProductImgList'
import TheProductInputForm from './../components/container/TheProductInputForm'
import TheProductSelectForm from './../components/container/TheProductSelectForm'
import TheSellProductActions from '../components/container/TheSellProductActions'

export default {
  components: {
    TheProductImgList,
    TheProductInputForm,
    TheProductSelectForm,
    TheSellProductActions
  },
  data() {
    return {
    }
  },
}
</script>