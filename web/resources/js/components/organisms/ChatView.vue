<template>
  <v-card elevation='1' width="420" class="d-flex flex-column">
    <ChatHead :tab="tab" @tab-change="tabChange" :items="items" />
      <v-tabs-items :value="tab" @change="tabChange">
        <v-tab-item
          v-for="item in items"
          :key="item.tab"
        >
          <v-sheet class="sheet-size d-flex flex-column">
            <component :is="item.content"></component>
          </v-sheet>
        </v-tab-item>
      </v-tabs-items>
    <!-- <TheChatActions /> -->
  </v-card>
</template>

<script>
import ChatHead from '../molecules/ChatHead'
import TheChatBody from '../container/TheChatBody'
import TheChatDetail from '../container/TheChatDetail'

export default {
  components: {
    ChatHead,
    TheChatBody,
    TheChatDetail
  },
  data() {
    return {
      tab: 0,
      items: [
        {
          tab: 'チャット',
          content: 'TheChatBody',
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
</style>