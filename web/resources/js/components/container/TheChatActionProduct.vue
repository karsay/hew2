<template>
  <ChatActionProduct
    :input="input"
    @handle-input="handleInput"
    @send-message="sendMessage"
  />
</template>

<script>
import ChatActionProduct from '../molecules/ChatActionProduct'
export default {
  name: 'TheChatActionProduct',
  components: {
    ChatActionProduct,
  },
  data() {
    return {
      input: '',
      
    }
  },
  methods: {
    handleInput(e) {
      this.input = e
    },
    sendMessage() {
      if(this.input !== '') {
        this.$store.dispatch('chat/sendMessage', this.input)
      } else {
        console.log('メッセージを入力してください')
      }
    }
  },
}
</script>

<style scoped>

</style>