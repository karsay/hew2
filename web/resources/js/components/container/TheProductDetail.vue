<template>
  <ProductDetail
    :images="images"
    :details="details"
    :description="description"
    :buttons="buttons"
    @on-click="toBuyPhase"
  />
</template>

<script>
import ProductDetail from '../organisms/ProductDetail.vue'
// apiで商品の画像をもらう（予定）

export default {
  components: { ProductDetail },
  data() {
    return {
      images: [
        "",
        "",
        "",
      ],
      details: [
        {
          label: "商品名",
          productItem: 'aaaa',
        },
        {
          label: "価格",
          productItem: '1,000',
        },
      ],
      description: "",
      buttons: {
        text: '購入画面へ進む'
      },
    }
  },
  computed: {
    payloadData() {
      return this.details.filter(({ label }) => label == "商品名" || "価格")
    }
  },
  methods: {
    toBuyPhase(e) {
      this.$router.push({
        name: 'buy',
        params: { details: this.payloadData }
      })
    },
  },
}
</script>

<style scoped>

</style>