<template>
  <NarrowDownSearch
    :selectItems="selectItems"
    :radioItems="radioItems"
    :input="input"
    @input-handle="inputHandle"
    @search="search"
  />
</template>

<script>
import NarrowDownSearch from '../organisms/NarrowDownSearch'
import { mapState } from 'vuex'

export default {
  components: { NarrowDownSearch },
  data() {
    return {
      input: '',
      selectItem: [
        {
          prop: 'category',
          selected: { key: 'search', item: "未選択" },
          subText: "カテゴリ",
          items: [
            {
              key: 'search',
              item: "未選択"
            },
          ]
        },
        {
          prop: 'state',
          selected: { key: 'search', item: "未選択" },
          subText: "商品の状態",
          items: [
            {
              key: 'search',
              item: "未選択"
            },
          ],
        },
        {
          prop: 'sort',
          selected: { key: 'search', item: "未選択" },
          subText: "日付・価格順",
          items: [
            {
              key: 'search',
              item: "未選択"
            },
          ],
        },
      ],
      radioItems: [
        {
          label: "販売状況",
          selected: { key: 0 },
          items: [
            {
              key: 0,
              item: "すべて",
            },
            {
              key: 1,
              item: "販売中のみ",
            },
            {
              key: 2,
              item: "取引済みのみ",
            }
          ]
        },
        {
          label: "配送料の負担",
          selected: { key: 0 },
          items: [
            {
              key: 0,
              item: "すべて"
            },
            {
              key: 1,
              item: "出品者負担"
            },
            {
              key: 2,
              item: "購入者負担"
            },
          ]
        }
      ]
    }
  },
  computed: {
    ...mapState('productStatus', ['category', 'state', 'sort']),
    selectItems() {
      let selectItems = this.selectItem
      for (let i = 0; i < this.category.length; i ++) {
        selectItems[0].items = [
          ...selectItems[0].items,
          {
            key: i,
            item: this.category[i]
          }
        ]
      }
      for (let i = 0; i < this.state.length; i++) {
        selectItems[1].items = [
          ...selectItems[1].items,
          {
            key: i,
            item: this.state[i]
          }
        ]
      }
      for (let i = 0; i < this.sort.length; i++) {
        selectItems[2].items = [
          ...selectItems[2].items,
          {
            key: i,
            item: this.sort[i]
          }
        ]
      }
      return selectItems
    },
    narrowDownData() {
      return {
        category_key: this.selectItems[0].selected.key,
        state_key: this.selectItems[1].selected.key,
        sort_key: this.selectItems[2].selected.key,
        sales_key: this.radioItems[0].selected.key,
        shipping_fee_key: this.radioItems[1].selected.key,
      }
    }
  },
  methods: {
    inputHandle(input) {
      this.input = input
    },
    resetItems() {
      this.input = ''
      for (let i = 0; i < this.selectItem.length; i++) {
        this.selectItem[i].selected = { key: 'search', item: "未選択" }
      }
      for (let i = 0; i < this.radioItems.length; i++) {
        this.radioItems[i].selected.key = 0
      }
    },
    search(keywords) {
      // api

      const narrowDown = {
        keywords: keywords,
        ...this.narrowDownData
      }
      this.$router.push({
        name: 'productList',
        params: {
          category: narrowDown.category_key
        },
        query: {
          keywords: narrowDown.keywords ? narrowDown.keywords : null,
          page: 1
        },
      }).catch(err => {})
      this.resetItems()
    },
  },
}
</script>

<style scoped>

</style>