<template>
  <v-card elevation='1' width="420" class="d-flex flex-column card-size">
    <ChatHead :tab="tab" @tab-change="tabChange" :items="items" />
    <v-tabs-items :value="tab" @change="tabChange">
      <v-tab-item
        v-for="item in items"
        :key="item.tab"
      >
        <v-sheet class="">
          <component :is="item.content"></component>
        </v-sheet>
      </v-tab-item>
    </v-tabs-items>
    <component class="mt-auto" :is="items[tab].button"></component>
  </v-card>
</template>

<script>
import ChatHead from '../molecules/ChatHead'
import TheChatBody from '../container/TheChatBody'
import TheChatDetail from '../container/TheChatDetail'
import TheChatActionSend from '../container/TheChatActionSend'

export default {
  components: {
    ChatHead,
    TheChatBody,
    TheChatDetail,
    TheChatActionSend,
  },
  data() {
    return {
      tab: 0,
      items: [
        {
          tab: 'チャット',
          content: 'TheChatBody',
          button: 'TheChatActionSend',
        },
        {
          tab: '商品状況',
          content: 'TheChatDetail',
          button: ''
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

<style lang="scss" scoped>
.card-size {
  max-height: 613px;
  min-height: 613px;
  overflow: hidden;
}
</style>