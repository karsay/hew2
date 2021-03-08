<template>
  <ChatActionSend
    :input="input"
    @handle-input="handleInput"
    @send-message="sendMessage"
  />
</template>

<script>
import ChatActionSend from '../molecules/ChatActionSend'
export default {
  name: 'TheChatActionSend',
  components: {
    ChatActionSend,
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