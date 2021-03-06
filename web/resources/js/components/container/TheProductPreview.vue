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
    async showDialog(e) {
      const response = await axios.post('/api/sell-product', {
        users_id:1,
        // users_id:this.userId,
        details_title:this.getProductItems['name'],
        categories_id:this.category.indexOf(this.getProductItems['category']) + 1,
        details_description:this.getProductItems['description'],
        details_price:this.getProductItems['price'],
        details_state:this.state.indexOf(this.getProductItems['state']),
        details_shipping_fee:this.shippingCost.indexOf(this.getProductItems['shippingCost']),
        details_area:this.shippingFrom.indexOf(this.getProductItems['shippingFrom']),
        shipping_date:this.shippingDays.indexOf(this.getProductItems['shippingDays']),
        image: this.images
      })
      console.log(response)

      // e.stopPropagation()
      // this.dialog = true
    },
    async closeDialog() {
      await (() => {
        this.dialog = false
      })

      this.$router.push('/product-list/?page=1')
    },
  },
  computed: {
    ...mapGetters('sellProduct', ['getImageItem']),
    ...mapGetters('sellProduct', ['getProductItems']),
    description() {
      return this.getProductItems['description']
    },
    userId(){
      return this.$store.getters['auth/userid']
    },
    images() {
      return [this.getImageItem["image_path1"], this.getImageItem["image_path2"], this.getImageItem["image_path3"]];
    },
    state(){
      return this.$store.getters['productStatus/state']
    },
    category(){
      return this.$store.getters['productStatus/category']
    },
    shippingCost(){
      return this.$store.getters['productStatus/shippingCost']
    },
    shippingFrom(){
      return this.$store.getters['productStatus/shippingFrom']
    },
    shippingDays(){
      return this.$store.getters['productStatus/shippingDays']
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