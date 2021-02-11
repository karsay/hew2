<template>
  <v-card flat>
    <v-row>
      <v-col cols="6" class="pa-0 my-auto text-center">
        <v-col cols="12">
          <v-icon size="80"><slot name="icon-face"></slot></v-icon>
          <v-icon size="40" class="primary--text">mdi-forward</v-icon>
          <v-icon size="80">mdi-database-search</v-icon>
        </v-col>

        <v-col cols="12">
          <v-icon size="80"><slot name="icon-fing"></slot></v-icon>
          <v-icon size="40" class="primary--text">mdi-forward</v-icon>
          <v-icon size="80">mdi-database-search</v-icon>
        </v-col>
      </v-col>

      <v-col cols="6">
        <v-card-title class="pa-0">
          <h4 class="text-h4">
            <slot name="title"></slot>
          </h4>
        </v-card-title>
        <v-card-text class="pa-0 mt-4">
          <slot name="text"></slot>
        </v-card-text>
      </v-col>

    </v-row>
  </v-card>
</template>

<script>
  export default {
    
  }
</script>

<style scoped>

</style>