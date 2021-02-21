<template>
  <AdjacentButtons
    :buttons="buttons"
    @on-click="toPreview"
  />
</template>

<script>
import AdjacentButtons from '../molecules/AdjacentButtons'

export default {
  components: { AdjacentButtons },
  data() {
    return {
      buttons: {
        text: "出品プレビュー"
      }
    }
  },
  methods: {
    toPreview() {
      this.$router.push('preview')
    },
  },
}
</script>

<style scoped>

</style>