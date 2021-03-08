<template>
  <ChatListCard
    :userData="userData"
  />
</template>

<script>
import { mapGetters } from 'vuex'
import ChatListCard from '../organisms/ChatListCard'

export default {
  components: {
    ChatListCard,
  },
  data() {
    return {
      user: []
    }
  },
  computed: {
    ...mapGetters('chat', ['userData']),
  }
}
</script>

<style scoped>

</style>