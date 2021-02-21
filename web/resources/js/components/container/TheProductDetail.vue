<template>
  <ProductDetail
    :details="details"
    :description="description"
    :buttons="buttons"
    @on-click="onDetail"
  />
</template>

<script>
import ProductDetail from '../organisms/ProductDetail.vue'

export default {
  components: { ProductDetail },
  data() {
    return {
      details: [],
      description: "",
      buttons: {
        text: '商品を購入する'
      }
    }
  },
  methods: {
    onDetail() {
      console.log('detailのeventやで')
    },
  },
}
</script>

<style scoped>

</style>