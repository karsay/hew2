<template>
  <v-navigation-drawer app v-model="drawerState" :temporary="true" >
    <v-list>
      <v-list-item>
        <v-list-item-content class="justify-center">
          user
        </v-list-item-content>
      </v-list-item>

      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-center">UserName</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
    
    <v-divider></v-divider>

    <v-list
      dense
      nav
    >
      <v-list-item-group
        color="primary"
      >
        <v-list-item
          link
          v-for="navButtonList in navButtonLists"
          :key="navButtonList.text"
        >
          <v-list-item-icon>
            <v-icon>{{ navButtonList.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ navButtonList.text }}</v-list-item-title>
          </v-list-item-content>

        </v-list-item>

        <v-list-group
          :value="true"
          no-action
        >
          <template v-slot:activator>
            <v-list-item-icon>
              <v-icon>{{ navDropdown.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-title>{{ navDropdown.text }}</v-list-item-title>
          </template>

          <v-list-item
            v-for="settingList in navDropdown.settingLists"
            :key="settingList"
          >
          <v-list-item-content>
            <v-list-item-title>
              {{ settingList }}
            </v-list-item-title>
          </v-list-item-content>
          </v-list-item>
        </v-list-group>

        <v-list-item>
          <v-list-item-icon>
            <v-icon>{{ navButtonLogout.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ navButtonLogout.text }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  props: {
    drawer: {
      type: Boolean
    }
  },
  data() {
    return {
      drawerState: this.drawer,
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
  watch: {
    drawer() {
      this.drawerState = !this.drawerState
    }
  },
}
</script>

<style lang="scss" scoped>

</style>