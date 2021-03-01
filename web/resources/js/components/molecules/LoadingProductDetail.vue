<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" color="#fafafa" class="px-6">
      <div class="img">
        <v-img
          class="img__position"
        ></v-img>
      </div>
      <v-card class="card card__position">
          
        <v-row>
          <v-col cols="6" class="pb-0">
            <v-skeleton-loader
              type="card-heading"
            ></v-skeleton-loader>
          </v-col>
          <v-col cols="3" class="pb-0">
            <v-skeleton-loader
              type="list-item"
            ></v-skeleton-loader>
          </v-col>
          <v-spacer></v-spacer>
          <v-col cols="2" class="pb-0">
            <v-skeleton-loader
              type="list-item"
            ></v-skeleton-loader>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="6" class="pt-0">
            <v-skeleton-loader
              type="list-item-two-line"
            ></v-skeleton-loader>
            <v-skeleton-loader
              type="list-item-two-line"
            ></v-skeleton-loader>
            <v-skeleton-loader
              type="list-item-two-line"
            ></v-skeleton-loader>
            <v-skeleton-loader
              type="list-item-two-line"
            ></v-skeleton-loader>
          </v-col>
          <v-col cols="6" class="pt-0 pr-4">
            <v-skeleton-loader
              type="card-heading"
            ></v-skeleton-loader>
            <v-skeleton-loader
              type="list-item-three-line"
            ></v-skeleton-loader>
            <v-skeleton-loader
              type="list-item-three-line"
            ></v-skeleton-loader>

            <v-col cols="12" class="d-flex">
              <v-skeleton-loader
                type="button"
              ></v-skeleton-loader>

              <v-spacer></v-spacer>

              <v-skeleton-loader
                type="button"
              ></v-skeleton-loader>
            </v-col>
          </v-col>
        </v-row>
      </v-card>
    </v-sheet>
  </v-container>
</template>

<script>

export default {

}
</script>

<style lang="scss" scoped>
.img {
  height: 500px;
  background-color: #E9E9E9;

  &__position {
    position: fixed;
    width: 672px;
  }
}

.card {
  border-radius: 8px !important;

  &__position {
    position: relative;
    top: -16px;
  }
}
</style>