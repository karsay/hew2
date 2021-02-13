<template>
  <div class="d-flex">

    <v-card class="mt-4 pa-4">
      <v-card-subtitle class="pa-0 mb-1">
        <p class="mb-0">
          <slot name="caption"></slot>
        </p>
      </v-card-subtitle>

      <div class="d-flex">
        <v-card class="mr-4" elevation="2">
          <v-btn depressed min-width="104" min-height="104" to="picture">
            <v-icon color="primary" size="48">mdi-camera-plus</v-icon>
          </v-btn>
        </v-card>

        <v-card class="mr-4" elevation="2">
            <v-img src="" min-width="104" min-height="104" />
        </v-card>

        <v-card  class="mr-4" elevation="2">
            <v-img src="" min-width="104" min-height="104" />
        </v-card>
      </div>
    </v-card>

  </div>
</template>

<script>
// 後にpropsでimgのデータを受け取る

export default {

}
</script>