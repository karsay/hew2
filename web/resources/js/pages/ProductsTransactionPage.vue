<template>
  <v-container class="d-flex justify-center">
    <ChatView />
    <TheChatListCard class="ml-4" />
  </v-container>
</template>

<script>
import TheChatListCard from '../components/container/TheChatListCard'
import ChatView from '../components/organisms/ChatView'

export default {
  components: {
    ChatView,
    TheChatListCard,
  },
}
</script>

<style scoped>
</style>