<template>
  <div>
    <v-card class="d-flex ma-4 card-style" flat>
      <v-img :src="'/storage/image0.jpg'" contain height="150" width="150" class="bg"></v-img>
      <div class="detail-size">
        <v-chip
          :class="[ product_type == 0 ? 'secondary' : 'primary' ]"
          label
        >
          {{ product_type == 0 ? '出品した商品' : '購入した商品' }}
        </v-chip>
        <v-card-subtitle class="px-0">
          {{ user_name }}
        </v-card-subtitle>
        <v-card-title class="px-0">
          {{ product_title }}
        </v-card-title>
      </div>
    </v-card>
    <v-divider class="mx-4"></v-divider>
  </div>
</template>

<script>
export default {
  props: {
    product_title: {
      type: String,
      default: '商品名'
    },
    user_name: {
      type: String,
      default: 'ユーザー名'
    },
    product_type: {
      type: Number,
      default: 0
    }
  }
}
</script>

<style scoped>
.card-style {
  cursor: pointer;
}

.detail-size {
  width: 150px;
}

.bg {
  background-color: #fafafa;
}
</style>