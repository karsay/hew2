<template>
  <ChatDetail
    :steps="steps"
    @set-step-state="setStepState"
    @to-product-detail="toProductDetail"
  />
</template>

<script>
import ChatDetail from '../molecules/ChatDetail'
import { mapState, mapMutations } from 'vuex'

export default {
  name: 'TheChatDetail',
  components: {
    ChatDetail,
  },
  data() {
    return {
      test: "aaa",
    }
  },
  computed: {
    ...mapState('chat', ['steps']),
  },
  methods: {
    ...mapMutations('search', ['setStepState']),
    toProductDetail() {
      console.log('商品詳細へ遷移します');
      // this.$router.push()
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