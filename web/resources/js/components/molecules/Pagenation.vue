<template>
  <div class="text-center">
    <v-pagination
      v-model="page"
      :length="length"
      @input="changePage"
    ></v-pagination>
  </div>
</template>

<script>
import { mapGetters, mapState, mapMutations } from 'vuex'

export default {
  data() {
    return {
      page: 1
    }
  },
  methods: {
    ...mapMutations('search', ['setPage']),
    changePage(pageNumber) {
      this.setPage(pageNumber)
      this.$router.push({
        name: 'productList',
        params: {
          ...this.$route.params
        },
        query: {
          ...this.$route.query,
          page: pageNumber
        }
      })
    } 
  },
  computed: {
    ...mapState('search', ['pageSize']),
    ...mapGetters('search', ['length'])
  }
}
</script>

<style scoped>

</style>