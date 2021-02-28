<template>
  <NarrowDownSearch
    :selectItems="selectItems"
    :radioItems="radioItems"
    @search="search"
  />
</template>

<script>
import NarrowDownSearch from '../organisms/NarrowDownSearch'

export default {
  components: { NarrowDownSearch },
  data() {
    return {
      selectItems: [
        {
          prop: 'sort',
          selected: { key: 0, item: "未選択" },
          subText: "並び順",
          items: [
            {
              key: 0,
              item: "未選択"
            },
            {
              key: 1,
              item: "新しい"
            },
            {
              key: 2,
              item: "古い"
            },
          ]
        },
        {
          prop: 'price',
          selected: { key: 0, item: "未選択" },
          subText: "価格",
          items: [
            {
              key: 0,
              item: "未選択"
            },
            {
              key: 1,
              item: "低い"
            },
            {
              key: 2,
              item: "高い"
            }
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
    narrowDownData() {
      return {
        sort_key: this.selectItems[0].selected.key,
        price_key: this.selectItems[1].selected.key,
        sold_key: this.radioItems[0].selected.key,
        shippingCost_key: this.radioItems[1].selected.key,
      }
    }
  },
  methods: {
    search() {
      // api

      const narrowDown = {
        category_id: Number(this.$route.params.category),
        ...this.narrowDownData
      }
      console.log(narrowDown)
    },
  },
}
</script>

<style scoped>

</style>