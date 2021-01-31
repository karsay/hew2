<template>
  <div
    class="white--text"
  >
    <HeaderNavigation @is-drawer="drawer = !drawer" :is-login-status="isLoginStatus" />
    <SideNavigation :drawer="drawer" />
    <v-btn
      :fab="true"
      :large="true"
      :fixed="true"
      :bottom="true"
      :right="true"
      class="secondary"
    >
      <v-icon>mdi-camera</v-icon>
    </v-btn>

  </div>
</template>

<script>
import HeaderNavigation from './../molecules/HeaderNavigation'
import SideNavigation from './../molecules/SideNavigation'

export default {
  components: {
    HeaderNavigation,
    SideNavigation,
  },
  props: {
    isLoginStatus: Boolean
  },
  data() {
    return {
      drawer: false,
    }
  },
  computed: {
  showBreakpoint () {
    console.log(this.$vuetify.breakpoint)
    return this.$vuetify.breakpoint.name
  }
  }
}
</script>

<style scoped>

</style>