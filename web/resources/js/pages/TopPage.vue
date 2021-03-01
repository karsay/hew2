<template>
  <div>
    <v-img src="" alt="" srcset="" height="240" class="primary_dark" />

    <v-card class="pb-12 card card__position">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          {{ sectionTitle.newProduct }}
        </v-card-title>
        <TheNewProducts />
      </v-container>

      <v-divider></v-divider>

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          {{ sectionTitle.pickUpCategory }}
        </v-card-title>
        <ThePickUpProducts />
      </v-container>

      <v-divider></v-divider>

      <TheSiteOverview />

      <v-container class="pt-8 pb-12 px-6">
        <v-row>
          <v-col cols="12">
            <TheSiteOverviewCard />
          </v-col>
        </v-row>
      </v-container>

    </v-card>
  </div>

</template>

<script>
import TheNewProducts from './../components/container/TheNewProducts'
import ThePickUpProducts from '../components/container/ThePickUpProducts'
import TheSiteOverview from './../components/container/TheSiteOverview'
import TheSiteOverviewCard from './../components/container/TheSiteOverviewCard'

/*
  # apiから受け取る
    - 新着アイテムの情報
    - ピックアップカテゴリの名前、アイテムのデータ
*/

export default {
  components: {
    TheNewProducts,
    ThePickUpProducts,
    TheSiteOverview,
    TheSiteOverviewCard,
  },
  data() {
    return {
      sectionTitle: {
        newProduct: "新着アイテム",
        pickUpCategory: "ピックアップカテゴリ",
      },
      newProduct: [],
      pickUpCategory: []
    }
  },
  // created: async function() {
  //   await axios.get('api/topProducts')
  //   .then(res => {
  //     this.newProduct = res.data[0].newProduct
  //     this.pickUpCategory
  //   })
  // }
}
</script>

<style lang="scss" scoped>
.card {
  border-radius: 16px !important;
}

.card__position {
  position: relative;
  top: -16px;
}
</style>