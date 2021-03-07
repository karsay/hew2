<template>
  <v-card elevation="1" class="card-size">
    <v-toolbar color="primary_dark" class="title ma-0" dark>
      <v-toolbar-title class="ma-0">
        取引相手一覧
      </v-toolbar-title>
    </v-toolbar>

    <div class="overflow">
      <ChatCard />
      <ChatCard />
      <ChatCard />
      <ChatCard />
    </div>

  </v-card>
</template>

<script>
import ChatCard from '../molecules/ChatCard'

export default {
  components: {
    ChatCard,
  }
}
</script>

<style scoped>

.card-size {
  height: 100%;
}
.overflow {
  height: calc(80vh - 88px);
  overflow: scroll;
}

</style>