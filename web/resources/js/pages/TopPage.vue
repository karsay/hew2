<template>
  <div>
    <img src="" alt="" srcset="" />

    <v-card class="card">

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          新着アイテム
        </v-card-title>

        <v-row>
          <v-col
            v-for="value in val"
            :key="value"
          >
            <product-card
              :product-image="productImage"
            >
              <template #product-price>1,000</template>
              <template #product-like_value>33</template>
              <template #product-name>productName</template>
            </product-card>
          </v-col>
        </v-row>
      </v-container>

      <v-divider></v-divider>

      <v-container class="py-10 px-6">
        <v-card-title class="pl-0">
          ピックアップカテゴリ
        </v-card-title>

        <v-row
          v-for="pickUpProduct in pickUpProducts"
          :key="pickUpProduct.id"
          class="pt-0 mb-6"
        >
        <v-card-text class="pb-1 pl-3">
          {{ pickUpProduct.category }}
        </v-card-text>
          <v-col
            v-for="value in val"
            :key="value"
            class="py-0"
          >
            <product-card
              :product-image="productImage"
            >
              <template #product-price>1,000</template>
              <template #product-like_value>33</template>
              <template #product-name>productName</template>
            </product-card>
          </v-col>
        </v-row>
      </v-container>

      <v-divider></v-divider>

      <site-overview>
        <template #overview-title>Relief Marketとは？</template>
        <template #overview-subtitle>IoTデバイス</template>
        <template #iot-overview>
          <p
            v-for="iotOverview in siteOverview.iotOverview"
            :key="iotOverview"
            class="ma-0 text-body-1 font-weight-regular"
          >
            {{ iotOverview }}
          </p>
        </template>
        <template #button-text>登録する</template>
      </site-overview>

      <v-container class="pt-8 px-6">
        <site-overview-card></site-overview-card>
      </v-container>

    </v-card>
  </div>

</template>

<script>
import ProductCard from './../components/molecules/ProductCard'
import SiteOverview from './../components/molecules/SiteOverview'
import SiteOverviewCard from './../components/molecules/SiteOverviewCard'

/*
  # apiから受け取る
    - 新着アイテムの情報
    - ピックアップカテゴリの名前、アイテムのデータ
*/

export default {
  components: {
    ProductCard,
    SiteOverview,
    SiteOverviewCard
  },
  data() {
    return {
      sectionTitle: {
        newProduct: "新着アイテム",
        pickUpCategory: "ピックアップカテゴリ",
        siteOverview: "Relief Marketとは？"
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
      siteOverview: {
        iotOverview: [
          "Relief Marketでは会員登録、ログイン、商品の出品、購入する際にユーザー本人であるかどうかを顔認証、指紋情報二つの生体情報を用いて登録、確認を行います。",
          "認証情報を取得する際、Relief Marketではユーザーに指紋認証、顔認証を可能とするIoTデバイスを利用していただき、サービスを使えるようにします。",
          "",
        ]
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.card {
  border-radius: 16px !important;
}
</style>