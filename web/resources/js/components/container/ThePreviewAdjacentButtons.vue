<template>
  <AdjacentButtons
    :buttons="buttons"
    @on-click="onPreview"
  />
</template>

<script>
import AdjacentButtons from '../molecules/AdjacentButtons'

export default {
  components: { AdjacentButtons },
  data() {
    return {
      buttons: {
        text: "出品を確定する"
      }
    }
  },
  methods: {
    onPreview() {
      console.log('previewのeventやで')
    },
  }
}
</script>

<style scoped>

</style>