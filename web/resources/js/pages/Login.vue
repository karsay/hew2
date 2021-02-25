<template>
<v-container fill-height>
    <v-card
      width="100%"
      height="100%"
      class="mx-auto mt-16"
      color="#F0F3F5"
      elevation-10
      max-height="680"
    >
    <div class="area" @dblclick="click"></div>
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
          <v-form ref="form" @submit.prevent="login">
            <h1 class="mt-5">ログイン</h1>
            <h2 class="my-2">生体情報を認証してください</h2>
            <v-row align="center">
              <v-col md="4">
                <img src="/assets/img/user_icon.png" class="ma-5" width="150px" height="150px" />
              </v-col>
              <v-col>
                <h2 v-if="flag1 == false" class="red--text hoge">カメラを顔に向けて画面を<br>ダブルクリックしてください</h2>
                <h2 v-else class="green--text hoge">ようこそ【{{userName}}】さん</h2>
              </v-col>
            </v-row>
            <v-row align="center">
              <v-col md="4">
                <img src="/assets/img/finger_icon.png" class="ma-5" width="150px" height="150px">
              </v-col>
              <v-col justifu="center">
                <h2 v-if="flag2 == false" class="red--text hoge">指紋を認証してください</h2>
                <span v-else>
                  <h2 v-if="this.complateFlag.data == 'true'" class="green--text hoge">認証成功！！</h2>
                  <h2 v-else class="red--text hoge">認証失敗・・・<br>もう一度やり直して下さい</h2>
                </span>
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
      raspAddress: "192.168.0.18",
      hostAddress: "192.168.0.16",
      // raspAddress:"192.168.43.108",
      // hostAddress:"192.168.43.6",
      userName:"",

      flag1:false,
      flag2:false,
      isDisabled:true,
      streamUrl: "",
      loginForm: {
        userId:"",
        fingerPass:null,
      },
      returnPassword:null
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.authentication();
      },
      immediate: true,
    },
  },
  methods: {

    async click() {
      await axios.post(`http://${this.raspAddress}:5000/shutter`)
    },

    async login () {
      // authストアのloginアクションを呼び出す
      await this.$store.dispatch('auth/login', this.loginForm)

      // トップページに移動する
      this.$router.push('/')
    },

    // 認証開始
    async authentication() {
      this.hoge = null
      this.streamUrl = `http://${this.raspAddress}:5000/stream`
      // 初期化
      this.loginForm.userId = null

      // ここのipアドレスをラズパイのアドレスに書き換えること
      const response = await axios.post(`http://${this.raspAddress}:5000`,{
        reqFlag: 'authentication',
        userId:null,
      });

      this.loginForm.userId = response.data[0];
      this.loginForm.fingerPass = response.data[1];

      var res = await axios.post(`/api/getlogininfo`,{'userId':this.loginForm.userId});
      this.userName = res.data;

      this.flag1 = true;

      // 指紋認証
      // ここのipアドレスをラズパイのアドレスに書き換えること
      this.complateFlag = await axios.post(`http://${this.raspAddress}:5000/fingerprint`,{
        userId:this.loginForm.userId,
        fingerPass:this.loginForm.fingerPass,
        fingerFlag:2
      });
      if (this.complateFlag.data == "true"){
        this.isDisabled = false
      }

      this.flag2 = true;
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