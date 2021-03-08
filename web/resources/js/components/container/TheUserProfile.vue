<template>
  <UserProfile
    :userName="username"
    :usersBirthday="usersBirthday"
  />
</template>

<script>
import UserProfile from '../organisms/UserProfile'
import { mapGetters } from 'vuex'

export default {
  components: {
    UserProfile
  },
  computed: {
    ...mapGetters('auth', ['username', 'usersBirthday'])
  }
}
</script>

<style scoped>

</style>