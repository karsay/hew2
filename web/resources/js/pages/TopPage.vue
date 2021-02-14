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
      val: new Array(5),
      productImage: {
        path: '',
        name: 'productName'
      },
      pickUpProducts: [
        {
          id: 1,
          category: 'カテゴリ1',
          products: [
            {
              imagePath: '',
              imageName: '',
              name: 'productName',
              price: '1,000',
              heart: 33
            }
          ]
        },
        {
          id: 2,
          category: 'カテゴリ2',
          products: [
            {
              imagePath: '',
              imageName: '',
              name: 'productName',
              price: '1,000',
              heart: 33
            }
          ]
        },
        {
          id: 3,
          category: 'カテゴリ3',
          products: [
            {
              imagePath: '',
              imageName: '',
              name: 'productName',
              price: '1,000',
              heart: 33
            }
          ]
        },
      ],
      
    }
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