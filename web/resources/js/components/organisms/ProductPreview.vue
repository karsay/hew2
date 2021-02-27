<template>
  <div>
    <HandleDialog
      :dialog="dialog"
      :dialogDetail="dialogDetail"
      @close-dialog="closeDialog"
    />
    <ProductDetail
      :images="images"
      :details="details"
      :description="description"
      :buttons="buttons"
      @on-click="showDialog"
    />
  </div>
</template>

<script>
import ProductDetail from './ProductDetail'
import HandleDialog from '../molecules/HandleDialog'

export default {
  components: {
    ProductDetail,
    HandleDialog,
  },
  props: {
    images: Array,
    dialog: Boolean,
    dialogDetail: Object,
    details: Array,
    description: String,
    buttons: Object,
  },
  methods: {
    closeDialog() {
      this.$emit('close-dialog')
    },
    showDialog(e) {
      this.$emit('on-click', e)
    }
  },
}
</script>

<style scoped>

</style>