<template>
  <v-card>
    <div class="d-flex pa-6">
      <div>
        <v-avatar
          :src="`/storage/${icon}`"
          color="primary"
          size="112"
        ></v-avatar>
      </div>
      <div class="pl-6">
        <v-card-title class="px-0">
          {{ userName }}
        </v-card-title>

        <div class="text-caption">
          生年月日：{{ `${usersBirthday[0]}年${usersBirthday[1]}月${usersBirthday[2]}日` }}
        </div>
      </div>

    </div>
    <v-divider class="mx-6"></v-divider>
    <div class="pa-6">
      <v-card-title class="pa-0 primary--text">
        自己紹介
      </v-card-title>
      
    </div>
  </v-card>
</template>

<script>
export default {
  props: {
    userName: {
      type: String,
      default: 'userName'
    },
    usersBirthday: {
      type: Array,
      default: ['2000','11','30']
    },
    icon: {
      type: String,
      default: 'test.jpg'
    },
  },
}
</script>

<style scoped>

</style>