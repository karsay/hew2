<template>
  <ProductDetail
    :details="details"
    :description="description"
    :isHeart="isHeart"
    @toggle-heart="toggleHeart"
  />
</template>

<script>
import ProductDetail from '../organisms/ProductDetail'
import { mapGetters } from 'vuex'

export default {
  components: { ProductDetail },
  data() {
    return {
      isHeart: false,
    }
  },
  methods: {
    toggleHeart() {
      this.isHeart = !this.isHeart
    }
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