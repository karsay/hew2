<template>
  <Pagenation
    :length="length"
    @change-page=changePage
  />
</template>

<script>
import Pagenation from '../molecules/Pagenation'
import { mapGetters, mapMutations } from 'vuex'

export default {
  components: { Pagenation },
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
    ...mapGetters('search', ['length'])
  }
}
</script>

<style scoped>

</style>