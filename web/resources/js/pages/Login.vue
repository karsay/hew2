<template>
<v-container fill-height>
  <v-row align="center" justify="center">
    <div class=area @dblclick ="click"></div>
    <v-col align="center">
      <v-btn depressed color="primary" @click="authentication" large> 認証開始 </v-btn>
      <v-btn depressed color="error" large> リセット </v-btn>
      <router-link to="/register">
        <v-btn depressed color="secondary" large > 新規登録 </v-btn>
      </router-link>

      <iframe :src="streamUrl" width="600" height="400" frameborder="0" style="border:0" allowfullscreen class="mt-5"></iframe>
    </v-col>
    <v-col>
      <v-form ref="form" @submit.prevent="login">
        <h1>ログイン</h1>
        <h2 class="green--text">{{msg}}</h2>
        <h2 class="green--text">{{msg1}}</h2>
        <h2 v-if="hoge == 'true'" class="green">ログイン成功！ようこそ{{loginForm.userId}}さん！！</h2>
        <h2 v-if="hoge == 'false'" class="red">エラー　もう一度認証してください</h2>
      </v-form>
    </v-col>
  </v-row>
</v-container>
</template>

<script>

export default {
  data(){
    return{
      hoge:null,
      complateFlag:null,
      raspAddress:"192.168.0.26",
      hostAddress:"192.168.0.14",
      // raspAddress:"192.168.43.108",
      // hostAddress:"192.168.43.6",

      msg:"",
      msg1:"",
      streamUrl:"",
      loginForm: {
        userId:null,
        inputPassword:null,
        fingerPass:null
      },
      returnPassword:null
    }
  },
  methods: {

    async click() {
      if(this.loading == true) {
        await axios.post(`http://${this.raspAddress}:5000/shutter`)
      }
    },

    // 認証開始
    async authentication() {
      this.hoge = null
      this.msg = "カメラを顔に向けて画面をダブルクリックしてください"
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
      this.msg = ""
      this.msg1 = ""
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
  height: 100vh;
  position: absolute;
}
</style>