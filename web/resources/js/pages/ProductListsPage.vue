<template>
<div>
    <TheNarrowDownSearch />

    <v-card class="pb-12 card card__position">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          {{ searchTitle }}
        </v-card-title>
        <TheProductLists />

        <ThePagenation />
      </v-container>

    </v-card>
  </div>
</template>

<script>
import TheNarrowDownSearch from '../components/container/TheNarrowDownSearch'
import ThePagenation from '../components/container/ThePagenation.vue'
import TheProductLists from '../components/container/TheProductLists'

  export default {
    components: {
      TheNarrowDownSearch,
      TheProductLists,
      ThePagenation,
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