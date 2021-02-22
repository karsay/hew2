<template>
<v-container fill-height>
  <v-row align="center" justify="center">
    <div class=area @dblclick ="click"></div>
    <v-col align="center">
      <v-btn depressed color="error" large> リセット </v-btn>
      <router-link to="/login">
        <v-btn depressed color="secondary" large> ログイン </v-btn>
      </router-link>
      <iframe :src="streamUrl" width="600" height="400" frameborder="0" style="border:0" allowfullscreen class="mt-5"></iframe>
    </v-col>
    <v-col>
      <v-form ref="form" @submit.prevent="registration">
        <h1>新規登録</h1>
        <h2 class="green--text">{{msg}}</h2>
        <h2 class="green--text">{{msg1}}</h2>
        <h2 class="red--text">{{errorMsg}}</h2>
        <h2 v-if="registFlag" class="green">登録完了！！！</h2>
        <v-text-field
          v-model="registForm.userId"
          :rules="nameRules"
          label="ユーザーID"
          required
        ></v-text-field>
        <v-btn depressed color="success" type="submit" large> 登録開始 </v-btn>
      </v-form>
    </v-col>
  </v-row>
</v-container>
</template>

<script>

export default {
  data(){
    return{
      registFlag:false,
      raspAddress:"192.168.0.26",
      hostAddress:"192.168.0.14",
      frame:"",
      // raspAddress:"192.168.43.108",
      // hostAddress:"192.168.43.6",
      msg:"",
      msg1:"",
      errorMsg:"",
      streamUrl:"",

      registForm: {
        userId:null,
      },

      nameRules: [
        v => !!v || 'ユーザーIDは必須です',
      ],
    }
  },
  methods: {
    async click() {
      if(this.loading == true) {
        await axios.post(`http://${this.raspAddress}:5000/shutter`)
      }
    },
    // 認証開始
    async registration() {
      this.loading = true
      this.errorMsg = ""
      this.streamUrl = `http://${this.raspAddress}:5000/video_feed`

      this.msg = "カメラを顔に向けて画面をダブルクリックしてください"
      // 顔登録
      // ここのipアドレスをラズパイのアドレスに書き換えること
      await axios.post(`http://${this.raspAddress}:5000`,{
        reqFlag: 'registration',
      });

      this.msg = "顔登録完了"
      this.msg1 = "指を乗せてください"

      // 指紋登録
      // ここのipアドレスをラズパイのアドレスに書き換えること
      const fingerInfo = await axios.post(`http://${this.raspAddress}:5000/fingerprint`,{
        fingerFlag:1
      });

      if (fingerInfo.data == "error") {
        this.errorMsg = "登録に失敗しました。もう一度やり直してください"
      } else {
        // 認証情報登録
        // ここのipアドレスを認証サーバーのアドレスに書き換えること
        const response = await axios.post(`http://${this.hostAddress}:5000/authenticationregistration`,{
          userId:this.registForm.userId,
          fingerPass:fingerInfo.data
        });
        this.msg = ""
        this.msg1 = ""
        this.registFlag = response.data;
      }
      this.streamUrl = ""
    },

  }
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