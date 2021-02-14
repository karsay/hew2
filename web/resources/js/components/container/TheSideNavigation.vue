<template>
  <SideNavigation
    :nav-button-lists="navButtonLists"
    :nav-button-logout="navButtonLogout"
    :nav-dropdown="navDropdown"
    :drawer="getDrawer"
    @is-drawer="isDrawer"
  />
</template>

<script>
import SideNavigation from './../organisms/SideNavigation'
import { mapGetters, mapMutations } from 'vuex'

export default {
  components: {
    SideNavigation,
  },
  data() {
    return {
      navButtonLists: [
        {
          icon: "mdi-account-circle",
          text: "プロフィール"
        },
        {
          icon: "mdi-heart",
          text: "いいね一覧"
        },
        {
          icon: "mdi-package-up",
          text: "出品情報"
        },
        {
          icon: "mdi-package-down",
          text: "購入情報"
        },
        {
          icon: "mdi-email",
          text: "お問い合わせ"
        },
      ],
      navDropdown: {
        icon: "mdi-cog",
        text: "設定",
        settingLists: [
          "プロフィール設定",
          "アカウント情報設定",
          "お支払方法設定",
          "認証情報再設定"
        ]
      },
      navButtonLogout: {
        icon: "mdi-logout-variant",
        text: "ログアウト"
      }
    }
  },
  methods: {
    ...mapMutations('navigation', ['isDrawer'])
  },
  computed: {
    ...mapGetters('navigation', ['getDrawer'])
  },
}
</script>