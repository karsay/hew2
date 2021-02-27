<template>
  <ProductPreview
    :images="images"
    :dialog="dialog"
    :dialogDetail="dialogDetail"
    :details="details"
    :description="description"
    :buttons="buttons"
    @on-click="showDialog"
    @close-dialog="closeDialog"
  />
</template>

<script>
import ProductPreview from '../organisms/ProductPreview'
import { mapGetters } from 'vuex'
// 前のページまたは、vuexから商品の画像を受け取る

export default {
  components: { ProductPreview },
  data() {
    return {
      images: [
        "",
        "",
        "",
      ],
      dialog: false,
      dialogDetail: {
        title: "出品完了",
        text: "商品の出品に成功しました！",
        buttonText: "ok",
      },
      buttons: {
        text: "出品を確定する"
      }
    }
  },
  methods: {
    showDialog(e) {
      e.stopPropagation()
      this.dialog = true
    },
    async closeDialog() {
      await (() => {
        this.dialog = false
      })

      this.$router.push('/product-list/?page=1')
    },
  },
  computed: {
    ...mapGetters('sellProduct', ['getProductItems']),
    description() {
      return this.getProductItems['description']
    },
    details() {
      return [
        {
          label: "商品名",
          productItem: this.getProductItems['name'],
        },
        {
          label: "価格",
          productItem: this.getProductItems['price'],
        },
        {
          label: "商品の状態",
          productItem: this.getProductItems['state'],
        },
        {
          label: "配送料の負担",
          productItem: this.getProductItems['shippingCost'],
        },
        {
          label: "発送元の地域",
          productItem: this.getProductItems['shippingFrom'],
        },
        {
          label: "発送までの日数",
          productItem: this.getProductItems['shippingDays'],
        },
      ]
    }
  },
}
</script>