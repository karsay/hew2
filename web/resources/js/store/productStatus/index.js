// productStatus

const state = {
  category: [
    "レディース",
    "メンズ",
    "キッズ",
    "インテリア",
    "スポーツ",
    "本・音楽・ゲーム",
    "家電・スマホ・カメラ",
  ],
  state: [
    "新品、未使用品",
    "未使用に近い",
    "目立つ傷、汚れ無し",
    "やや傷、汚れあり",
    "傷や、汚れあり"
  ],
  shippingCost: [
    "出品者負担",
    "購入者負担",
  ],
  shippingFrom: [
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
  shippingDays: [
    "当日",
    "1~3日",
    "3~5日",
    "5日以上",
  ]
}

export default {
  namespaced: true,
  state
}