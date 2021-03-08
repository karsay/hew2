<template>
  <ChatDetail
    :steps="steps"
    :stepState="stepState"
    :selectData="selectData"
    @set-step="setStep"
    @to-product-detail="toProductDetail"
  />
</template>

<script>
import ChatDetail from '../molecules/ChatDetail'
import { mapState, mapMutations, mapGetters } from 'vuex'

export default {
  name: 'TheChatDetail',
  components: {
    ChatDetail,
  },
  data() {
    return {

    }
  },
  computed: {
    ...mapState('chat', ['steps']),
    ...mapGetters('chat', ['selectData', 'stepState'])
  },
  methods: {
    ...mapMutations('chat', ['setStepState']),
    setStep(step) {
      const data = {
        id: this.selectData.product_id,
        step: step
      }
      this.$store.dispatch('chat/updateShippingState', data)
    },
    toProductDetail() {
      this.$router.push({
        name: 'productDetail',
        params: {
          product: this.selectData.product_id
        }
      })
    },
    priceAmend(price) {
      const formatter = new Intl.NumberFormat('ja-JP')
      return formatter.format(price)
    },
  },
}
</script>

<style scoped>

</style>