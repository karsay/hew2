<template>
<v-container fill-height>
    <div class="area" @dblclick="click"></div>
    <v-card
      width="100%"
      height="100%"
      class="mx-auto mt-16"
      color="#F0F3F5"
      elevation-10
      max-height="680"
    >
      <v-row>
        <v-col align="center">
          <iframe
            :src="streamUrl"
            width="400"
            height="600"
            frameborder="0"
            style="border: 0"
            allowfullscreen
          ></iframe>
        </v-col>
        <v-col>
          <v-form ref="form" @submit.prevent="registration">
            <h1 class="mt-5">ログイン</h1>
            <h2 class="my-2">生体情報を認証してください</h2>
            <!-- <v-text-field
              v-model="registForm.userId"
              :rules="nameRules"
              label="ユーザーID"
              required
            ></v-text-field> -->
            <v-row align="center">
              <v-col md="4">
                <img src="/assets/img/user_icon.png" class="ma-5" width="150px" height="150px" />
              </v-col>
              <v-col>
                <h2 v-if="flag1 == false" class="red--text hoge">カメラを顔に向けて画面を<br>ダブルクリックしてください</h2>
                <h1 v-else class="green--text hoge">OK!!!</h1>
              </v-col>
            </v-row>
            <v-row align="center">
              <v-col md="4">
                <img src="/assets/img/finger_icon.png" class="ma-5" width="150px" height="150px">
              </v-col>
              <v-col justifu="center">
                <h2 v-if="flag2 == false" class="red--text hoge">指紋を認証してください</h2>
                <h1 v-else class="green--text hoge">OK!!!</h1>
              </v-col>
            </v-row>
            <div class="mt-10" align="center">
              <v-btn :disabled="isDisabled" color="primary" rounded x-large type="submit" width="250">
                ログイン
              </v-btn>
            </div>
            <div class="my-5" align="center">
              <router-link to="/register">
                <v-btn text color="primary"> 新規登録はこちら </v-btn>
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
  data(){
    return{
      hoge:null,
      raspAddress:"192.168.0.26",
      hostAddress:"192.168.0.14",
      // raspAddress:"192.168.43.108",
      // hostAddress:"192.168.43.6",

      flag1:false,
      flag2:false,
      isDisabled:true,
      streamUrl: "",
      loginForm: {
        userId:1,
        inputPassword:null,
        fingerPass:null
      },
      returnPassword:null
    }
  },
  methods: {

    async click() {
      await axios.post(`http://${this.raspAddress}:5000/shutter`)
    },

    // 認証開始
    async authentication() {
      this.hoge = null
      this.streamUrl = `http://${this.raspAddress}:5000/video_feed`
      // 初期化
      this.loginForm.userId = null

      // ここのipアドレスをラズパイのアドレスに書き換えること
      const response = await axios.post(`http://${this.raspAddress}:5000`,{
        reqFlag: 'authentication',
        userId:null,
      });

      this.loginForm.userId = response.data[0];
      this.loginForm.fingerPass = response.data[1];

      this.msg = `ようこそ${this.loginForm.userId}さん`
      this.msg1 = "指を乗せてください"

      // 指紋認証
      // ここのipアドレスをラズパイのアドレスに書き換えること
      this.complateFlag = await axios.post(`http://${this.raspAddress}:5000/fingerprint`,{
        userId:this.loginForm.userId,
        fingerPass:this.loginForm.fingerPass,
        fingerFlag:2
      });
      this.hoge = this.complateFlag.data;
      this.streamUrl = ""
    },
  },
}
</script>

<style scoped>
* {
  text-decoration: none;
}
.area {
  width: 100vw;
  height: 100%;
  position: absolute;
}

iframe {
  border: none;
  width: 100%;
  height: 100%;
  min-height: 650px;
  padding: 0;
  margin: 0;
}
.defalt_img {
  object-fit: cover;
  width: 100%;
  height: 100%;
  /* min-height: 650px; */
}
</style>