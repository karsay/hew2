<template>
  <v-container class="d-flex justify-center">
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
</style>