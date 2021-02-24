<template>
  <v-container class="d-flex justify-center">
    <HandleDialog
      :dialog="dialog"
      :dialogDetail="dialogDetail"
      @close-dialog="closeDialog"
    />
    <v-card width="720" elevation="1">
      <v-img width="100%" height="270" class="bg"></v-img>

      <v-card-title>
        <h5 class="text-h5 primary--text">購入確認</h5>
      </v-card-title>
      <v-row class="d-flex mx-1 my-0">
        <v-col
          cols="6"
          class="py-2"
          v-for="detail in details"
          :key="detail.label"
        >
          <v-card-text class="pa-0">
            <ProductDetailItem
              :label="detail.label"
              :productItem="detail.productItem"
            />
          </v-card-text>
        </v-col>
      </v-row>

      <v-row class="my-0">
        <v-col cols="12" class="py-2">
          <v-card class="mx-4 pa-0" elevation="2">
            <v-card-actions>
              <PaymentMethod
                :radio="radio"
                @is-radio="isRadio"
              />
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>

      <v-row class="my-0">
        <v-col cols="6" class="pt-1">
          <AdjacentButtons
            class="px-4"
            @on-click="showDialog"
            :buttons="buttons"
          />
        </v-col>
      </v-row>
    </v-card>
    
  </v-container>
</template>

<script>
import ProductDetailItem from '../molecules/ProductDetailItem'
import AdjacentButtons from '../molecules/AdjacentButtons'
import PaymentMethod from '../molecules/PaymentMethod'
import HandleDialog from '../molecules/HandleDialog'

export default {
  components: {
    ProductDetailItem,
    AdjacentButtons,
    PaymentMethod,
    HandleDialog
  },
  props: {
    dialog: Boolean,
    dialogDetail: Object,
    radio: Boolean,
    buttons: Object,
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
    showDialog(e) {
      this.$emit('on-click', e)
    },
    closeDialog() {
      this.$emit('close-dialog')
    },
  },
}
</script>

<style lang="scss" scoped>
.radio {
  width: 100%;
}

// あとで消す
.bg {
  background-color: #ddd;
}

</style>