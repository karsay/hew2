<template>
  <SideNavigation
    :nav-button-lists="navButtonLists"
    :nav-button-logout="navButtonLogout"
    :nav-dropdown="navDropdown"
    :drawer="getDrawer"
    @is-drawer="isDrawer"
    @to-select-page="toSelectPage"
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
          text: "プロフィール",
          prop: 'profile',          
        },
        {
          icon: "mdi-heart",
          text: "いいね一覧",
          prop: 'profile',
        },
        {
          icon: "mdi-email",
          text: "お問い合わせ",
          prop: 'profile',
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
    ...mapMutations('navigation', ['isDrawer']),
    toSelectPage(page) {
      this.$router.push({
        name: page,
      }).catch(err => {})
    }
  },
  computed: {
    ...mapGetters('navigation', ['getDrawer'])
  },
}
</script>