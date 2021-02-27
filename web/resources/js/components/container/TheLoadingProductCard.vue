<template>
  <LoadingProductCard
    :path="path"
    :name="name"
    :price="price"
  />
</template>

<script>
import LoadingProductCard from '../molecules/LoadingProductCard'

export default {
  components: { LoadingProductCard },
  data() {
    return {
      path: '',
      name: "Relief Market",
      price: "loading..."
    }
  },
}
</script>

<style scoped>

</style>