<template>
  <div class="d-flex flex-column chat">
    <div class="chat-body">
      chat body
    </div>
    <v-spacer></v-spacer>
    <!-- <div class="mt-auto chat-action"> -->
      <TheChatActions />
    <!-- </div> -->
  </div>
</template>

<script>
import TheChatActions from "../container/TheChatActions"

export default {
  components: {
    TheChatActions,
  }
}
</script>

<style scoped>
.chat-body {
  /* height: 350px; */
}
</style>