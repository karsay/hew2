<template>
  <SiteOverviewCard
    :icon-account="iconAccount"
    :icon-fingerprint="iconFingerprint"
    :title="title"
    :text="text"
  />
</template>

<script>
import SiteOverviewCard from './../organisms/SiteOverviewCard'

export default {
  components: { SiteOverviewCard },
  data() {
    return {
      iconAccount: "mdi-account",
      iconFingerprint: "mdi-fingerprint",
      title: "生体認証によるメリット",
      text: [
        "生体認証とは、指紋や静脈、声など、身体の一部やそれに準ずる要素を使い",
        "ユーザーを特定する仕組みです。",
        "Relief Marketでは多くのフリーマーケットの課題である、ユーザーの",
        "複数アカウント作成、転売等のトラブルを限りなく少なくすることができます。",
        "これらの多くのトラブルは生体情報を使うことで画面の向こう側のユーザーを、",
        "間接的に特定し、問題に応じた処置を素早く行うことを実現します。",
        "Relief Marketではユーザーに厳しいルールを押し付けるのではなく、",
        "ユーザーに安心を与えるサービスを目指します。"
      ]
    }
  }
}
</script>

<style scoped>

</style>