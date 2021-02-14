<template>
  <SiteOverview
    :title="title"
    :subtitle="subtitle"
    :overview-text="overviewText"
    :button-text="buttonText"
  />
</template>

<script>
import SiteOverview from './../organisms/SiteOverview'

export default {
  components: { SiteOverview },
  data() {
    return {
      title: "Relief Marketとは？",
      subtitle: "IoTデバイス",
      overviewText: [
        "Relief Marketでは会員登録、ログイン、商品の出品、購入する際にユーザー本人であるかどうかを顔認証、指紋情報二つの生体情報を用いて登録、確認を行います。",
        "認証情報を取得する際、Relief Marketではユーザーに指紋認証、顔認証を可能とするIoTデバイスを利用していただき、サービスを使えるようにします。",
        "",
      ],
      buttonText: "登録する"
    }
  }
}
</script>

<style scoped>

</style>