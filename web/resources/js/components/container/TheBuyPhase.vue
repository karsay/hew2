<template>
  <div>
  <BuyPhase
    :details="details"
    :radio="radio"
    @on-click="showDialog"
    :buttons="buttons"
    :dialog="dialog"
    :dialogDetail="dialogDetail"
    @is-radio="isRadio"
    @close-dialog="closeDialog"
  />
  </div>
</template>

<script>
import BuyPhase from '../organisms/BuyPhase'

export default {
  components: { BuyPhase },
  data() {
    return {
      dialog: false,
      dialogDetail: {
        title: "購入完了",
        text: "商品の購入に成功しました！",
        buttonText: "ok",
      },
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
    showDialog(e) {
      e.stopPropagation()
      this.dialog = true
    },
    closeDialog() {
      this.dialog = false
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