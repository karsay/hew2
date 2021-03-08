<template>
  <div>
    <v-card class="d-flex ma-4 card-style" flat @click="selectData">
      <v-img :src="`/storage/${data.product_image}`" contain height="150" width="150" class="bg"></v-img>
      <div class="detail-size">
        <v-chip
          :class="[ data.product_is_selled == 0 ? 'secondary' : 'primary' ]"
          label
        >
          {{ data.product_is_selled == 0 ? '出品した商品' : '購入した商品' }}
        </v-chip>
        <v-card-subtitle class="px-0">
          {{ data.user_name }}
        </v-card-subtitle>
        <v-card-title class="px-0">
          {{ data.product_title }}
        </v-card-title>
      </div>
    </v-card>
    <v-divider class="mx-4"></v-divider>
  </div>
</template>

<script>
export default {
  props: {
    data: Object,
    // product_image: {
    //   type: String,
    //   default: 'test.jpg'
    // },
    // product_title: {
    //   type: String,
    //   default: '商品名'
    // },
    // user_name: {
    //   type: String,
    //   default: 'ユーザー名'
    // },
    // product_is_selled: {
    //   type: Number,
    //   default: 1
    // }
  },
  methods: {
    selectData() {
      this.$store.commit('chat/setSelectData', this.data)
    },
  },
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