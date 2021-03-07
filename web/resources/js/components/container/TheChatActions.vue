<template>
  <ChatActions
    :input="input"
    @handle-input="handleInput"
    @send-message="sendMessage"
  />
</template>

<script>
import ChatActions from '../molecules/ChatActions'
export default {
  components: {
    ChatActions,
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