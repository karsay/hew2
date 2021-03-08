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
import { mapGetters } from 'vuex'
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
    async showDialog(e) {
      e.stopPropagation()
      await axios.post('/api/buy-product',
      {
        user_id: this.userid,
        product_id: this.$route.params.product
      })
      this.dialog = true
    },
    async closeDialog() {
      await (() => {
        this.dialog = false
      })
      this.$router.push('/')
    },
  },
  computed: {
    ...mapGetters('auth', ['userid']),
    details() {
      return this.$route.params.details
    }
  }
}
</script>

<style scoped>

</style>