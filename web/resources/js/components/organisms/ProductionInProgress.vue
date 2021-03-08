<template>
  <v-card flat>
      <div
        v-for="product in productionInProgress"
        :key="product.index"
      >
      
      <div class="d-flex pa-6">
        <v-img
          :src="`/storage/${ product.product_image }`"
          class="img-size"
        ></v-img>
        <div>
          <v-card-subtitle class="primary_light--text">
            {{ product.date }}
          </v-card-subtitle>        
          <v-card-title>
            商品名：{{ product.product_name }}
          </v-card-title>
          
          <v-card-title class="py-0">
            ユーザー：{{ product.user_name }}
          </v-card-title>   
          <v-card-title class="py-0">
            価格：{{ product.product_price }}
          </v-card-title> 
        </div>
        <v-divider class="my-6"></v-divider>
      </div>

    </div>
  </v-card>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'ProductionInProgress',
  computed: {
    ...mapGetters('chat', ['productionInProgress'])
  }
}
</script>

<style lang="scss" scoped>
.img-size {
  max-width: 200px;
  max-height: 200px;
  object-fit: cover;
}
</style>