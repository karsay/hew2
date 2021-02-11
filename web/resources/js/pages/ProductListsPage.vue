<template>
<div>
    <v-img src="" alt="" srcset="" height="240" class="primary_dark" />

    <v-card class="pb-12 card card__position">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          新着アイテム
        </v-card-title>

        <v-pagination
          v-model="pageNum"
          :length="6"
          @input="pagenationHandle"
        >
        </v-pagination>
      </v-container>

    </v-card>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        pageNum: 1
      }
    },
    methods: {
      pagenationHandle() {
        this.$router.push(`/productList/${this.pageNum}`)
      }
    },
  }
</script>

<style scoped>
.card {
  border-radius: 16px !important;
}

.card__position {
  position: relative;
  top: -16px;
}
</style>