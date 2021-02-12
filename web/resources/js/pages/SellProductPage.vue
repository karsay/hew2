<template>
  <v-container class="pt-0 d-flex justify-center">
    <v-sheet width="720" class="px-6 mt-10">
      <h4 class="text-h4">商品情報入力フォーム</h4>
      <h5 class="mt-10 text-h5">商品を撮影する</h5>

      <!-- component -->
      <div class="d-flex">

        <v-card class="mt-4 pa-4">
          <v-card-subtitle class="pa-0 mb-1">
            <p class="mb-0">※商品のイメージは最低3枚撮ってください</p>
          </v-card-subtitle>

          <div class="d-flex">
            <v-card class="mr-4" elevation="2">
              <v-btn depressed min-width="104" min-height="104">
                <v-icon color="primary" size="48">mdi-camera-plus</v-icon>
              </v-btn>
            </v-card>

            <v-card class="mr-4" elevation="2">
              <v-btn depressed min-width="104" min-height="104">
                <v-img src="" />
              </v-btn>
            </v-card>

            <v-card  class="mr-4" elevation="2">
              <v-btn depressed min-width="104" min-height="104">
                <v-img src="" />
              </v-btn>
            </v-card>
          </div>
        </v-card>

      </div>
      <!-- component -->

      <v-divider class="my-10"></v-divider>

      <h5 class="mb-6 text-h5">商品情報を入力する</h5>
      <v-row>
        <v-col cols="6">

          <!-- component -->
          <v-card class="px-4 py-6">
            <v-text-field
              v-for="inputItem in inputItems"
              :key="inputItem.label"
              :label="inputItem.label"
              outlined
            ></v-text-field>
            <v-textarea
              label="商品説明"
              outlined
            >
            </v-textarea>
          </v-card>
          <!-- component -->

        </v-col>

        <v-col cols="6">

          <!-- component -->
          <v-card class="px-4 py-6">
            <v-select
              v-for="selectItem in selectItems"
              :key="selectItem.subText"
              :label="selectItem.subText"
              :items="selectItem.item"
              outlined
            >
            </v-select>
          </v-card>
          <!-- component -->

          <v-col
            class="d-flex px-0"
          >
              <v-btn
                width="150"
                color="primary"
                class="mr-6"
              >
                出品プレビュー
              </v-btn>

              <v-spacer></v-spacer>

              <v-btn
                width="150"
                color="primary"
                text
              >
                キャンセル
              </v-btn>

          </v-col>
        </v-col>


      </v-row>

    </v-sheet>
  </v-container>
</template>

<script>
  export default {
    data() {
      return {
        inputItems: [
          {
            label: "商品名",
          },
          {
            label: "価格",
          },
          {
            label: "タグ名",
          },
        ],
        selectItems: [
          {
            subText: "商品の状態",
            item: [
              "新品、未使用品",
              "未使用に近い",
              "目立つ傷、汚れ無し",
              "やや傷、汚れあり",
              "傷や、汚れあり"
            ],
          },
          {
            subText: "配送料の負担",
            item: [
              "出品者負担",
              "購入者負担",
            ],
          },
          {
            subText: "発送元の地域",
            item: [
              "北海道地方",
              "東北地方",
              "関東地方",
              "中部地方",
              "近畿地方",
              "中国地方",
              "四国地方",
              "九州地方",
              "その他",
            ],
          },
          {
            subText: "発送までの日数",
            item: [
              "当日",
              "1~3日",
              "3~5日",
              "5日以上",
            ],
          },
        ]
      }
    },
  }
</script>

<style scoped>
.sheet {
  background-color: rgb(226, 65, 92);
}

.a {
  width: 100%;
  display: flex;
  justify-content: space-between;
}
</style>