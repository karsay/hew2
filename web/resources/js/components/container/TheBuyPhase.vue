<template>
  <div>
  <BuyPhase
    :details="details"
    :radio="radio"
    @is-radio="isRadio"
    :buttons="buttons"
    @on-click="onClick"
  />
  </div>
</template>

<script>
import BuyPhase from '../organisms/BuyPhase'

export default {
  components: { BuyPhase },
  data() {
    return {
      radio: true,
      buttons: {
        text: '購入する'
      }
    }
  },
  methods: {
    isRadio() {
      this.radio = !this.radio
    },
    onClick(e) {
      console.log('buyPhaseやで');
    }
  },
  computed: {
    details() {
      return this.$route.params.details
    }
  }
}
</script>

<style scoped>

</style>