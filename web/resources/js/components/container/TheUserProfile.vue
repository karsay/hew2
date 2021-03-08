<template>
  <UserProfile
    :userName="username"
    :icon="userIcon"
    :usersBirthday="usersBirthday"
    :usersProfile="usersProfile"
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
    ...mapGetters(
      'auth',
      [
        'username',
        'usersBirthday',
        'usersProfile',
        'userIcon'
      ]
    )
  }
}
</script>

<style scoped>

</style>