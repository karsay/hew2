<template>
  <v-container class="container d-flex justify-center align-center">
    <ChatView />
    <ChatListCard />
  </v-container>
</template>

<script>
import ChatListCard from '../components/organisms/ChatListCard.vue'
import ChatView from '../components/organisms/ChatView'

export default {
  components: {
    ChatView,
    ChatListCard
  },
}
</script>

<style scoped>
.container {
  height: 80vh;
}
</style>