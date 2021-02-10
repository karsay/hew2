<template>
  <BaseNavigation :is-login-status="isLoginStatus" />
</template>

<script>
import { mapState } from 'vuex'
import BaseNavigation from './../organisms/BaseNavigation.vue'

export default {
  components: {
    BaseNavigation
  },
  computed: {
    ...mapState(
      "auth",
      ["isLoginStatus"]
    )
  }
}
</script>