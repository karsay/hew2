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
            <ProductDetailItem
              v-for="detail in details"
              :key="detail.prop"
              :label="detail.label"
              :productItem="detail.productItem"
            />
          </v-col>

          <v-col cols="6">
            <v-card-subtitle class="pa-0">
              <p>userName</p>
            </v-card-subtitle>
            <v-card-title class="py-0 px-0 mb-2">
              <h5 class="pt-0 text-h5 primary--text">商品説明</h5>
            </v-card-title>

            <div>
              <v-card-text class="card__textarea">
                <p>
                  {{ detailTexts }}
                </p>
              </v-card-text>
              <v-card-actions class="px-0">
                
  <!-- <v-col class="d-flex px-0">
    <v-btn
      width="150"
      color="primary"
      class="mr-6"
      to="preview"
    >
      出品プレビュー
    </v-btn>

    <v-spacer></v-spacer>

    <v-btn
      width="150"
      color="primary"
      text
    >
      キャンセル
    </v-btn>
  </v-col> -->
              </v-card-actions>
            </div>
          </v-col>
        </v-row>
      </v-card>
    </v-sheet>
  </v-container>
</template>

<script>
import ProductDetailItem from './../molecules/ProductDetailItem'

export default {
  components: { ProductDetailItem },
  props: {
    details: Array,
    detailTexts: String
  }
}
</script>

<style lang="scss" scoped>
.card {
  border-radius: 8px !important;

  &__position {
    position: relative;
    top: -16px;
  }
  &__textarea {
    display: block;
    box-sizing: border-box;
    width: 100%;
    height: 100%;
    border: 1px solid rgba($color: #000000, $alpha: .37);
    border-radius: 4px;
  }
}

.img {
  background-color: #ddd;
}
</style>