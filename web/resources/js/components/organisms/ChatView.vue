<template>
  <v-card elevation='1'>
    <ChatHead />
      <v-sheet class="sheet-size" height="70vh"></v-sheet>
    <ChatActions />
  </v-card>
</template>

<script>
import ChatActions from '../molecules/ChatActions'
import ChatHead from '../molecules/ChatHead'

export default {
  components: {
    ChatHead,
    ChatActions,
  }
}
</script>

<style scoped>
.sheet-size {
}
</style>