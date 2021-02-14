<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" class="px-6">
      <v-img fixed src="" width="672" height="448" class="img" />
      <v-card class="py-6 px-6 card card__position">
        <v-row>
          <v-col cols="6">
            <v-card-title class="py-0 px-0 mb-2">
              <h5 class="text-h5 primary--text">商品詳細</h5>
            </v-card-title>

            <div>
              <v-card-subtitle class="pa-0">
                <p class="ma-0">商品名</p>
              </v-card-subtitle>
              <v-card-text class="pb-2 px-0">
                <p class="ma-0 text-h6 card__text">{{ getSellProductData.name }}</p>
              </v-card-text>
            </div>

            <div>
              <v-card-subtitle class="pa-0">
                <p class="ma-0">価格</p>
              </v-card-subtitle>
              <v-card-text class="pb-2 px-0">
                <p class="ma-0 text-h6 card__text">{{ getSellProductData.price }}</p>
              </v-card-text>
            </div>

            <div>
              <v-card-subtitle class="pa-0">
                <p class="ma-0">商品の状態</p>
              </v-card-subtitle>
              <v-card-text class="pb-2 px-0">
                <p class="ma-0 text-h6 card__text">{{ getSellProductData.state }}</p>
              </v-card-text>
            </div>

            <!-- <v-text-field label="商品名" readonly :value="getSellProductData.name"></v-text-field> -->
            <!-- <v-text-field label="価格" readonly :value="getSellProductData.price"></v-text-field> -->


          </v-col>

          <v-col cols="6">
            <v-card-title class="py-0 px-0 mb-2">
              <h5 class="pt-0 text-h5 primary--text">商品説明</h5>
            </v-card-title>

          </v-col>
        </v-row>
      </v-card>
    </v-sheet>
  </v-container>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters(
      'sellProduct', ['getSellProductData']
    )
  },
}
</script>

<style lang="scss" scoped>
.card {
  border-radius: 8px !important;

  &__position {
    position: relative;
    top: -16px;
  }

  &__text {
    border-bottom: solid 1px rgba($color: #000, $alpha: .37);
  }
}

.img {
  background-color: #ddd;
}
</style>