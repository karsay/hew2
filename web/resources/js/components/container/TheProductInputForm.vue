<template>
  <ProductInputForm
    :inputItems="inputItems"
    :textareaItem="textareaItem"
    @set-input-items="setInputItems"
  />
</template>

<script>
import ProductInputForm from './../organisms/ProductInputForm'
import { mapMutations } from 'vuex'

export default {
  components: { ProductInputForm },
  data() {
    return {
      inputItems: [
        {
          prop: 'name',
          label: "商品名",
          type: 'text',
          value: ""
        },
        {
          prop: 'price',
          label: "価格",
          type: 'number',
          value: ""
        }
      ],
      textareaItem: {
        label: "商品説明",
        prop: 'description',
        value: ""
      }
    }
  },
  methods: {
    ...mapMutations('sellProduct', ['setInputItems']),
  },
}
</script>

<style scoped>

</style>