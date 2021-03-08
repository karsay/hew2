<template>
  <v-card elevation="1">
    <v-toolbar color="primary_dark" class="title ma-0" dark>
      <v-toolbar-title class="ma-0">
        取引相手一覧
      </v-toolbar-title>
    </v-toolbar>

    <div
    >
      <ChatCard 
        v-for="data in userData"
        :key="data.index"
        :data="data"
      />
    </div>

  </v-card>
</template>

<script>
import ChatCard from '../molecules/ChatCard'

export default {
  components: {
    ChatCard,
  },
  props: ['userData']
}
</script>

<style scoped>
</style>