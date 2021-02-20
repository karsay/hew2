<template>
  <ProductSelectForm
    :selectItems="selectItems"
  />
</template>

<script>
import ProductSelectForm from './../organisms/ProductSelectForm'
import { mapGetters, mapMutations } from 'vuex'

export default {
  components: { ProductSelectForm },
  data() {
    return {
      selectedItems: {
        category: '',
        state: '',
        shippingCost: '',
        shippingFrom: '',
        shippingDays: ''
      },
      selectItems: [
        {
          selected: "",
          subText: "商品のカテゴリ",
          item: [
            "レディース",
            "メンズ",
            "キッズ",
            "インテリア",
            "スポーツ",
            "本・音楽・ゲーム",
            "家電・スマホ・カメラ",
          ]
        },
        {
          selected: "",
          subText: "商品の状態",
          item: [
            "新品、未使用品",
            "未使用に近い",
            "目立つ傷、汚れ無し",
            "やや傷、汚れあり",
            "傷や、汚れあり"
          ],
        },
        {
          selected: "",
          subText: "配送料の負担",
          item: [
            "出品者負担",
            "購入者負担",
          ],
        },
        {
          selected: "",
          subText: "発送元の地域",
          item: [
            "北海道地方",
            "東北地方",
            "関東地方",
            "中部地方",
            "近畿地方",
            "中国地方",
            "四国地方",
            "九州地方",
            "その他",
          ],
        },
        {
          selected: "",
          subText: "発送までの日数",
          item: [
            "当日",
            "1~3日",
            "3~5日",
            "5日以上",
          ],
        },
      ]
    }
  },
  methods: {
    ...mapMutations('sellProduct', ['setSellProductData'])
  },
  computed: {
    ...mapGetters("sellProduct", ["getSellProductData"]),
    mergeProductData() {
      
    }
  }
}
</script>

<style scoped>

</style>