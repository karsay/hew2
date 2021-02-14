<template>
  <v-navigation-drawer app @input="isDrawer" :value="drawer" :temporary="true" >
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
    navButtonLists: Array,
    navButtonLogout: Object,
    navDropdown: Object,
    drawer: Boolean,
  },
  methods: {
    isDrawer(e) {
      this.$emit('is-drawer', e)
    },
  },

}
</script>

<style lang="scss" scoped>

</style>