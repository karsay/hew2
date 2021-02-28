<template>
<div>
    <TheNarrowDownSearch />

    <v-card class="pb-12 card card__position">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          新着アイテム
        </v-card-title>

        <Pagenation :current-page="currentPage" :last-page="lastPage" />
      </v-container>

    </v-card>
  </div>
</template>

<script>
import TheNarrowDownSearch from '../components/container/TheNarrowDownSearch'
import Pagenation from './../components/molecules/Pagenation'

  export default {
    components: {
      TheNarrowDownSearch,
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
    methods: {
      /* api完成後 */
      async fetchProductsData() {
        // const res = await axios.get(`/api/photos/?page=${this.page}`)

        // 仮レスポンス
        const res = {
          data: {
            data: [],
            currentPage: this.pageVal += 1,
            lastPage: 10
          }
        }

        this.products = res.data.data
        this.currentPage = res.data.currentPage
        this.lastPage = res.data.lastPage
      },

    },
    watch: {
      $route: {
        async handler () {
          await this.fetchProductsData()
        },
        immediate: true
      }
    }
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