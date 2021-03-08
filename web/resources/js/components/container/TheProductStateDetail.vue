<template>
  <div>
    <template v-if="isLoading">
      <LoadingProductDetail />
    </template>
    <template v-else>
      <ProductStateDetail
        :images="images"
        :userName="userName"
        :details="details"
        :description="description"
      />
    </template>
  </div>
</template>

<script>
import ProductStateDetail from '../organisms/ProductStateDetail.vue'
import LoadingProductDetail from '../molecules/LoadingProductDetail'
import { mapState } from 'vuex'
// apiで商品の画像をもらう（予定）

export default {
  components: {
    ProductStateDetail,
    LoadingProductDetail
  },
  data() {
    return {
      isLoading: true,
      images: [
        "",
        "",
        "",
      ],
      userName: "",
      description: "",
      details: [],
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
  },
  methods: {
    priceAmend(price) {
      const formatter = new Intl.NumberFormat('ja-JP')
      return formatter.format(price)
    },
  },
  created: async function() {
    await axios.get(`/api/products/${this.$route.params.product}`)
    .then(res => {
      const data = res.data
      this.userName = data.user_name
      this.description = data.product_description
      this.images = data.product_image
      this.details = [
        { 
          label: "商品名",
          productItem: data.product_title
        },
        { 
          label: "価格",
          productItem: this.priceAmend(data.product_price)
        },
        { 
          label: "商品の状態",
          productItem: this.state[data.product_state]
        },
        { 
          label: "配送料の負担",
          productItem: this.shippingCost[data.product_shipping_fee]
        },
        { 
          label: "発送元の地域",
          productItem: this.shippingFrom[data.product_area]
        },
        { 
          label: "発送までの日数",
          productItem: this.shippingDays[data.product_date]
        },
      ]
      this.isLoading = false
    })
  }
}
</script>

<style scoped>

</style>