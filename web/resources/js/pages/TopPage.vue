<template>
  <div>
    <v-img src="/assets/svg/header.svg" />

    <v-card class="pb-12 card card__position">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          {{ sectionTitle.newProduct }}
        </v-card-title>
        <TheNewProducts
          :isLoading="isLoading"
          :newProducts="newProducts"
        />
      </v-container>

      <v-divider></v-divider>

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          {{ sectionTitle.pickUpCategory }}
        </v-card-title>
        <ThePickUpProducts
          :isLoading="isLoading"
          :pickUpProducts="pickUpProducts"
        />
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
      isLoading: true,
      sectionTitle: {
        newProduct: "新着アイテム",
        pickUpCategory: "ピックアップカテゴリ",
      },
      newProducts: [],
      pickUpProducts: []
    }
  },
  created: async function() {
    await axios.get('/api/top-products')
    .then(res => {
      this.newProducts = res.data[0].newProducts
      this.pickUpProducts = [
        { ...res.data[1].category1 },
        { ...res.data[2].category2 },
        { ...res.data[3].category3 },
      ]
      this.isLoading = false
    })
  }
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