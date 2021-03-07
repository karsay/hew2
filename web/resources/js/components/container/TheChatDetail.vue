<template>
  <ChatDetail
    :description="description"
    :details="productDetails"
    :images="images"
  />
</template>

<script>
import ChatDetail from '../molecules/ChatDetail'
import { mapState, mapGetters } from 'vuex'

export default {
  name: 'TheChatDetail',
  components: {
    ChatDetail,
  },
  data() {
    return {
      test: "aaa",
    }
  },
  computed: {
    ...mapState(
      'productStatus',
      [
        'category',
        'state',
        'shippingCost',
        'shippingFrom',
        'shippingDays'
      ]
    ),
    ...mapGetters('chat', ['productDetail']),
    images() {
      return this.productDetail.product_image
    },
    description() {
      return this.productDetail.product_description
    },
    productDetails() {
      return [
        { 
          label: "商品名",
          productItem: this.productDetail.product_title
        },
        { 
          label: "価格",
          productItem: this.priceAmend(this.productDetail.product_price)
        },
        { 
          label: "商品の状態",
          productItem: this.state[this.productDetail.product_state]
        },
        { 
          label: "配送料の負担",
          productItem: this.shippingCost[this.productDetail.product_shipping_fee]
        },
        { 
          label: "発送元の地域",
          productItem: this.shippingFrom[this.productDetail.product_area]
        },
        { 
          label: "発送までの日数",
          productItem: this.shippingDays[this.productDetail.product_date]
        },
      ]
    }
  },
  methods: {
    priceAmend(price) {
      const formatter = new Intl.NumberFormat('ja-JP')
      return formatter.format(price)
    },
  },
}
</script>

<style scoped>

</style>