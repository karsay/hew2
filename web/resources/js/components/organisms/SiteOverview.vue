<template>
  <v-container class="py-10 px-6">
    <v-card-title class="pl-0">
      <h3 class="text-h3">
        {{ title }}
      </h3>
    </v-card-title>

    <v-row class="pt-0">
      <v-col cols="6">
        <v-img
          src=""
          height="359"
          class="primary"
        ></v-img>
      </v-col>

      <v-col cols="6" class="d-flex flex-column">
        <v-card-subtitle class="pt-0 pl-0">
          <h4 class="text--primary text-h4">
            {{ subtitle }}
          </h4>
        </v-card-subtitle>

        <v-card-text class="pa-0">
          <p
            v-for="text in overviewText"
            :key="text"
            class="ma-0 text-body-1 font-weight-regular"
          >
            {{ text }}
          </p>
        </v-card-text>

        <v-card-actions class="mt-auto pa-0">
          <v-col cols="6" class="pa-0 text-center">
            <v-icon size="48" class="mr-6">mdi-account</v-icon>
            <v-icon size="48">mdi-fingerprint</v-icon>
          </v-col>

          <v-col cols="6" class="pa-0 text-center">
            <v-btn
              width="176"
              class="primary"
              @click="toLogin"
            >
              {{ buttonText }}
            </v-btn>
          </v-col>
        </v-card-actions>

      </v-col>

    </v-row>

  </v-container>
</template>

<script>
export default {
  props: {
    title: String,
    subtitle: String,
    overviewText: Array,
    buttonText: String
  },
  methods: {
    toLogin() {
      this.$router.push('/login')
    },
  },
}
</script>

<style lang="scss" scoped>

</style>