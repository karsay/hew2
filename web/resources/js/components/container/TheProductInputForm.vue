<template>
  <ProductInputForm
    :inputItems="inputItems"
  />
</template>

<script>
import ProductInputForm from './../organisms/ProductInputForm'

export default {
  components: { ProductInputForm },
  data() {
    return {
      inputItems: [
        {
          label: "商品名",
        },
        {
          label: "価格",
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>