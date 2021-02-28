<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" color="#fafafa" class="px-6">
      <CarouselImage
        :images="images"
      />
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

          <v-col cols="6" class="d-flex flex-column">
            <v-card-subtitle class="pa-0 d-flex">
              <p class="text-body-1 py-1">userName</p>
              <v-spacer></v-spacer>

              <TheToggleHeart />

            </v-card-subtitle>

            <v-card-title class="py-0 px-0 mb-2">
              <h5 class="pt-0 text-h5 primary--text">商品説明</h5>
            </v-card-title>

            <v-card-text class="card__textarea pa-2">
              <p class="text-body-1">
                {{ description }}
              </p>
            </v-card-text>

            <v-card-actions class="pa-0 pt-auto">
              <AdjacentButtons
                :buttons="buttons"
                @on-click="onClick"
              />
            </v-card-actions>
          </v-col>
        </v-row>
      </v-card>
    </v-sheet>
  </v-container>
</template>

<script>
import CarouselImage from '../molecules/CarouselImage'
import ProductDetailItem from './../molecules/ProductDetailItem'
import TheToggleHeart from '../container/TheToggleHeart'
import AdjacentButtons from '../molecules/AdjacentButtons'

export default {
  components: {
    CarouselImage,
    ProductDetailItem,
    TheToggleHeart,
    AdjacentButtons
  },
  props: {
    images: Array,
    details: Array,
    description: String,
    buttons: Object
  },
  methods: {
    onClick(e) {
      this.$emit('on-click', e)
    },
    toggleHeart() {
      this.$emit('toggle-heart')
    }
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
  &__textarea {
    display: block;
    box-sizing: border-box;
    width: 100%;
    height: 100%;
    border: 1px solid rgba($color: #000000, $alpha: .37);
    border-radius: 4px;
  }
}


</style>