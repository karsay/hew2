<template>
  <v-card elevation='1' width="420" class="card-size d-flex flex-column">
    <ChatHead :tab="tab" @tab-change="tabChange" :items="items" />
      <v-tabs-items :value="tab" @change="tabChange" class="sheet-size">
        <v-tab-item
          v-for="item in items"
          :key="item.tab"
        >
          <component :is="item.content"></component>
        </v-tab-item>
      </v-tabs-items>
    <TheChatActions />
  </v-card>
</template>

<script>
import TheChatActions from '../container/TheChatActions'
import ChatHead from '../molecules/ChatHead'
import ChatBody from '../molecules/ChatBody'
import TheChatDetail from '../container/TheChatDetail'

export default {
  components: {
    ChatHead,
    TheChatActions,
    ChatBody,
    TheChatDetail
  },
  data() {
    return {
      tab: 0,
      items: [
        {
          tab: 'チャット',
          content: 'chat-body',
        },
        {
          tab: '商品詳細',
          content: 'TheChatDetail',
        }
      ]
    }
  },
  methods: {
    tabChange(e) {
      this.tab = e
    },
  },
}
</script>

<style scoped>
.card-size {
  height: 100%;
}
.sheet-size {
  height: 100%;
}
</style>