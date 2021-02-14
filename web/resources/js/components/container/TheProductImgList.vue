<template>
  <ProductImgList
    :caption="caption"
    @to-picture="toPicture"
  />
</template>

<script>
import ProductImgList from './../organisms/ProductImgList.vue'

export default {
  components: { ProductImgList },
  data() {
    return {
      caption: "※商品のイメージは最低3枚必要です"
    }
  },
  methods: {
    toPicture() {
      this.$router.push('picture')
    }
  },
}
</script>

<style scoped>

</style>