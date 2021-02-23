<template>
  <v-container class="d-flex justify-center">
    <v-card width="720">
      <v-img width="100%" height="270"></v-img>

      <v-card-title>
        <h5 class="text-h5 primary--text">購入確認</h5>
      </v-card-title>
      <v-row class="d-flex">
        <v-col
          cols="6"
          v-for="detail in details"
          :key="detail.label"
        >
          <v-card-text>
            <ProductDetailItem
              :label="detail.label"
              :productItem="detail.productItem"
            />
          </v-card-text>
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="12">
          <v-card class="mx-4">
            <v-card-actions>
              <PaymentMethod
                :radio="radio"
                @is-radio="isRadio"
              />
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-card>
    
  </v-container>
</template>

<script>
import ProductDetailItem from '../molecules/ProductDetailItem'
import AdjacentButtons from '../molecules/AdjacentButtons'
import PaymentMethod from '../molecules/PaymentMethod'

export default {
  components: {
    ProductDetailItem,
    AdjacentButtons,
    PaymentMethod
  },
  props: {
    radio: Boolean,
    details: {
      type: Array,
      default: () => [
        {
          label: '商品名',
          productItem: 'aaaa'
        },
        {
          label: '価格',
          productItem: '1,000'
        }
      ]
    }
  },
  methods: {
    isRadio() {
      this.$emit('is-radio')
    },
  },
}
</script>

<style lang="scss" scoped>
.radio {
  width: 100%;
}

</style>