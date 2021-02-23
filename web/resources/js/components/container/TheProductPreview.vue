<template>
  <ProductPreview
    :dialog="dialog"
    :dialogDetail="dialogDetail"
    :details="details"
    :description="description"
    :buttons="buttons"
    @on-click="showDialog"
    @close-dialog="closeDialog"
  />
</template>

<script>
import ProductPreview from '../organisms/ProductPreview'
import { mapGetters } from 'vuex'

export default {
  components: { ProductPreview },
  data() {
    return {
      dialog: false,
      dialogDetail: {
        title: "Dialog",
        text: "this is dialog",
        buttonText: "商品一覧へ",
      },
      buttons: {
        text: "出品を確定する"
      }
    }
  },
  methods: {
    showDialog(e) {
      e.stopPropagation()
      this.dialog = true
    },
    closeDialog() {
      this.dialog = false
    },
  },
  computed: {
    ...mapGetters('sellProduct', ['getProductItems']),
    description() {
      return this.getProductItems['detail']
    },
    details() {
      return [
        {
          label: "商品名",
          productItem: this.getProductItems['name'],
        },
        {
          label: "価格",
          productItem: this.getProductItems['price'],
        },
        {
          label: "商品の状態",
          productItem: this.getProductItems['state'],
        },
        {
          label: "配送料の負担",
          productItem: this.getProductItems['shippingCost'],
        },
        {
          label: "発送元の地域",
          productItem: this.getProductItems['shippingFrom'],
        },
        {
          label: "発送までの日数",
          productItem: this.getProductItems['shippingDays'],
        },
      ]
    }
  },
}
</script>