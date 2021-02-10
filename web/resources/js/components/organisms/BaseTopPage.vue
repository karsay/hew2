<template>
  <div>
    <img src="" alt="" srcset="" />

    <v-card class="card">

      <v-container class="pt-10 pr-6 pl-6 pb-10">
        <v-card-title class="pl-0">
          新着アイテム
        </v-card-title>

        <v-row>
          <v-col
            v-for="value in val"
            :key="value"
          >
            <product-card
              :product-image="productImage"
            >
              <template #product-price>1,000</template>
              <template #product-like_value>33</template>
              <template #product-name>productName</template>
            </product-card>
          </v-col>
        </v-row>
      </v-container>

      <v-divider></v-divider>

      <v-container class="pt-10 pr-6 pl-6 pb-10">
        <v-card-title class="pl-0">
          ピックアップカテゴリ
        </v-card-title>

        <v-card-text class="pa-0">
          subtitle
        </v-card-text>
        <v-row
          class="pt-0"
        >
          <v-col
            v-for="value in val"
            :key="value"
          >
            <product-card
              :product-image="productImage"
            >
              <template #product-price>1,000</template>
              <template #product-like_value>33</template>
              <template #product-name>productName</template>
            </product-card>
          </v-col>
        </v-row>
      </v-container>

      <v-divider></v-divider>

      <v-container class="pt-10 pr-6 pl-6 pb-10">
        <v-row
          class="pt-0"
        >
          <v-col
            v-for="value in val"
            :key="value"
          >
          </v-col>
        </v-row>
      
      </v-container>
    </v-card>
  </div>

</template>

<script>
import ProductCard from './../molecules/ProductCard'

export default {
  components: {
    ProductCard,
  },
  data() {
    return {
      val: new Array(5),
      productImage: {
        path: '',
        name: 'productName'
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.card {
  border-radius: 16px !important;
}
</style>