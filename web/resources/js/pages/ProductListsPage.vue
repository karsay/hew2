<template>
<div>
    <TheNarrowDownSearch />

    <v-card class="pb-12 card card__position">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          {{ searchTitle }}
        </v-card-title>
        <TheProductLists />

        <Pagenation :current-page="currentPage" :last-page="lastPage" />
      </v-container>

    </v-card>
  </div>
</template>

<script>
import TheNarrowDownSearch from '../components/container/TheNarrowDownSearch'
import TheProductLists from '../components/container/TheProductLists'
import Pagenation from './../components/molecules/Pagenation'

  export default {
    components: {
      TheNarrowDownSearch,
      TheProductLists,
      Pagenation,
    },
    props: {
      page: {
        type: Number,
        required: false,
        default: 1
      }
    },
    data() {
      return {
        products: [],
        currentPage: 0,
        lastPage: 0,
        pageVal: 0
      }
    },
    computed: {
      searchTitle() {
        return this.$route.query.keywords
        ? this.$route.query.keywords + '：検索結果'
        : '検索結果'
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