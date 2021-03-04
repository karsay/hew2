<template>
  <div class="d-flex">
    <v-card class="mt-4 pa-4">
      <v-card-subtitle class="pa-0 mb-1">
        <p class="mb-0">
          {{ caption }}
        </p>
      </v-card-subtitle>

      <div class="d-flex">
        <v-card class="mr-4" elevation="2">
          <v-dialog transition="dialog-bottom-transition" max-width="1200">
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                depressed
                min-width="104"
                min-height="104"
                @click="toPicture"
                v-bind="attrs"
                v-on="on"
                class="pa-0"
              >
                <v-icon color="primary" size="48" v-if="flag == false"
                  >mdi-camera-plus</v-icon
                >
                <v-img v-else :src="'data:image/jpeg;base64,' + b64Imgs[0]" width="104" height="104" />
              </v-btn>
            </template>

            <template v-slot:default="dialog">
              <v-card>
                <div class="area" @dblclick="click"></div>
                <v-toolbar color="primary" dark>商品イメージ撮影</v-toolbar>
                <v-card-text>
                  <v-row>
                    <v-col align="center">
                      <iframe
                        :src="streamUrl"
                        frameborder="0"
                        style="border: 0"
                        allowfullscreen
                        class="mt-5"
                      ></iframe>
                    </v-col>
                    <v-col>
                      <h1 class="mt-5">商品イメージ撮影</h1>
                      <h2 class="my-5">
                        この画面をダブルクリックすることで撮影します
                      </h2>
                      <v-row align="center" class="mt-10">
                        <v-col md="4">
                          <v-icon color="primary" size="100" class="ml-10"
                            >mdi-camera-plus</v-icon
                          >
                        </v-col>
                        <v-col>
                          <h1 class="green--text">残り{{ 3 - cnt }}枚</h1>
                        </v-col>
                      </v-row>

                      <div class="d-flex mt-10 modal-flex">
                        <v-card class="mr-4" elevation="2">
                          <v-img
                            :src="'data:image/jpeg;base64,' + b64Imgs[0]"
                            width="139"
                            height="104"
                          />
                        </v-card>
                        <v-card class="mr-4" elevation="2">
                          <v-img
                            :src="'data:image/jpeg;base64,' + b64Imgs[1]"
                            width="139"
                            height="104"
                          />
                        </v-card>
                        <v-card class="mr-4" elevation="2">
                          <v-img
                            :src="'data:image/jpeg;base64,' + b64Imgs[2]"
                            width="139"
                            height="104"
                          />
                        </v-card>
                      </div>

                      <div class="mt-15" align="center">
                        <v-btn
                          :disabled="isDisabled"
                          color="primary"
                          rounded
                          x-large
                          width="250"
                          @click="dialog.value = false;"
                        >
                          登録する
                        </v-btn>
                      </div>
                    </v-col>
                  </v-row>
                </v-card-text>
                <v-card-actions class="justify-end">
                  <v-btn text @click="dialog.value = false">Close</v-btn>
                </v-card-actions>
              </v-card>
            </template>
          </v-dialog>
        </v-card>

        <v-card class="mr-4" elevation="2">
          <v-img :src="'data:image/jpeg;base64,' + b64Imgs[1]" width="104" height="104" />
        </v-card>

        <v-card class="mr-4" elevation="2">
          <v-img :src="'data:image/jpeg;base64,' + b64Imgs[2]" width="104" height="104" />
        </v-card>
      </div>
    </v-card>
  </div>
</template>

<script>
// 後にpropsでimgのデータを受け取る

export default {
  data() {
    return {
      b64Imgs: [],
      cnt: 0,
      raspAddress: "192.168.0.19",
      // raspAddress:"192.168.43.108",
      streamUrl: "",
      isDisabled: true,
      flag: false,
    };
  },
  props: {
    caption: String,
  },
  methods: {
    async toPicture() {
      this.streamUrl = `http://${this.raspAddress}:5000/stream`;

      while (this.cnt < 3) {
        var response = await axios.post(
          `http://${this.raspAddress}:5000/product_shooting`
        );
        this.b64Imgs.push(response.data);
        this.$store.commit('sellProduct/setImageItems', { prop: `image_path${this.cnt + 1}`, value: 'data:image/jpeg;base64,' + response.data })
        this.cnt++;
      }

      this.flag = true;
      this.isDisabled = false;
    },
    async click() {
      await axios.post(`http://${this.raspAddress}:5000/shutter`);
    },
  },
};
</script>

<style scoped>
.area {
  width: 100%;
  height: 700px;
  position: absolute;
}

iframe {
  border: none;
  width: 100%;
  height: 680px;
  padding: 0;
  margin: 0;
}
.defalt_img {
  object-fit: cover;
  width: 100%;
  height: 100%;
}

.modal-flex {
  justify-content: center;
}
</style>