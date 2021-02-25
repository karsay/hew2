<template>
  <v-container fill-height>
    <v-card
      width="100%"
      height="100%"
      class="mx-auto"
      color="#F0F3F5"
      elevation-10
      max-height="680"
    >
    <div class="area" @dblclick="click"></div>
      <v-row>
        <v-col align="center">
          <iframe
            :src="streamUrl"
            frameborder="0"
            style="border: 0"
            allowfullscreen
          ></iframe>
        </v-col>
        <v-col>
          <v-form ref="form" @submit.prevent="registration">
            <h1 class="mt-5">新規登録</h1>
            <h2 class="my-2">生体情報を登録します</h2>
            <v-row align="center">
              <v-col md="4">
                <img src="/assets/img/user_icon.png" class="ma-5" width="150px" height="150px" />
              </v-col>
              <v-col>
                <h2 v-if="flag1 == false" class="red--text">カメラを顔に向けて画面を<br>ダブルクリックしてください</h2>
                <h1 v-else class="green--text">OK!!!</h1>
              </v-col>
            </v-row>
            <v-row align="center">
              <v-col md="4">
                <img src="/assets/img/finger_icon.png" class="ma-5" width="150px" height="150px">
              </v-col>
              <v-col justifu="center">
                <h2 v-if="flag2 == false" class="red--text">指紋を登録してください</h2>
                <h1 v-else class="green--text">OK!!!</h1>
              </v-col>
            </v-row>
            <div class="mt-10" align="center">
              <router-link to="/register-form">
                <v-btn :disabled="isDisabled" color="primary" rounded x-large width="250">
                  アカウント情報入力へ進む
                </v-btn>
              </router-link>
            </div>
            <div class="my-5" align="center">
              <router-link to="/login">
                <v-btn text color="primary"> ログインはこちら </v-btn>
              </router-link>
            </div>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      raspAddress: "192.168.0.18",
      hostAddress: "192.168.0.16",
      // raspAddress:"192.168.43.108",
      // hostAddress:"192.168.43.6",
      flag1:false,
      flag2:false,
      isDisabled:true,
      streamUrl: "",

      registForm: {
        userId: "",
      },

    };
  },
  watch: {
    $route: {
      async handler() {
        await this.fetchId();
        await this.registration();
      },
      immediate: true,
    },
  },
  methods: {
    async click() {
      await axios.post(`http://${this.raspAddress}:5000/shutter`);
    },
    async fetchId(){
      const response = await axios.get(`/api/fetchId`);
      this.registForm.userId = response.data["users_id"] + 1;
    },
    // 認証開始
    async registration() {
      this.streamUrl = `http://${this.raspAddress}:5000/stream`;
      // 顔登録
      // ここのipアドレスをラズパイのアドレスに書き換えること
      await axios.post(`http://${this.raspAddress}:5000`, {
        reqFlag: "registration",
      });

      this.flag1 = true;

      // 指紋登録
      // ここのipアドレスをラズパイのアドレスに書き換えること
      const fingerInfo = await axios.post(
        `http://${this.raspAddress}:5000/fingerprint`,
        {
          fingerFlag: 1,
        }
      );

      this.flag2 = true;

      if (fingerInfo.data == "error") {
        alert("登録に失敗しました。もう一度やり直してください");
        this.flag1 = false;
        this.flag2 = false;
      } else {
        // 認証情報登録
        // ここのipアドレスを認証サーバーのアドレスに書き換えること
        const response = await axios.post(
          `http://${this.hostAddress}:5000/authenticationregistration`,
          {
            userId: this.registForm.userId,
            fingerPass: fingerInfo.data,
          }
        );
        this.isDisabled = false;
      }
      this.streamUrl = "";
    },
  },
};
</script>

<style scoped>
* {
  text-decoration: none;
}
.area {
  width: 100%;
  height: 100%;
  position: absolute;
}
iframe {
  border: none;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}
.defalt_img {
  object-fit: cover;
  width: 100%;
  height: 100%;
}

</style>