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
          selected: { key: 0, item: "未選択" },
          subText: "商品の状態",
          items: [
            {
              key: 0,
              item: "未選択"
            },
          ],
        },
      ],
      radioItems: [
        {
          label: "並び順",
          selected: { key: 0 },
          items: [
            {
              key: 0,
              item: "未選択",
            },
            {
              key: 1,
              item: "新しい",
            },
            {
              key: 2,
              item: "古い",
            }
          ]
        },
        {
          label: "価格",
          selected: { key: 0 },
          items: [
            {
              key: 0,
              item: "未選択",
            },
            {
              key: 1,
              item: "高い",
            },
            {
              key: 2,
              item: "低い",
            }
          ]
        },
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
    ...mapState('productStatus', ['category', 'state']),
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
      return selectItems
    },
    narrowDownData() {
      return {
        category_key: this.selectItems[0].selected.key,
        state_key: this.selectItems[1].selected.key,
        sort_key: this.radioItems[0].selected.key,
        price_key: this.radioItems[1].selected.key,
        sales_key: this.radioItems[2].selected.key,
        shipping_fee_key: this.radioItems[3].selected.key,
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
        this.selectItem[i].selected = { key: 0, item: "未選択" }
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
      })
      this.resetItems()
    },
  },
}
</script>

<style scoped>

</style>