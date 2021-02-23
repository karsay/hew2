<template>
  <div>
  <BuyPhase
    :details="details"
    :radio="radio"
    @is-radio="isRadio"
  />
  </div>
</template>

<script>
import BuyPhase from '../organisms/BuyPhase'

export default {
  components: { BuyPhase },
  data() {
    return {
      radio: true
    }
  },
  methods: {
    isRadio() {
      this.radio = !this.radio
    },
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