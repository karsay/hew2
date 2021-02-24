<template>
  <v-container fill-height>
    <v-card width="800px" height="100%" class="mx-auto">
      <h1 align="center" class="mt-5">アカウント情報入力</h1>
      <v-card-text>
        <v-form ref="form" class="ma-10" @submit.prevent="register">
          <v-text-field
            v-model="registerForm.userName"
            label="※名前(アカウント名)"
            required
            class="mb-3"
            prepend-icon="mdi-account"
          ></v-text-field>

          <v-text-field
            v-model="registerForm.userEmail"
            label="※E-mailアドレス"
            required
            class="mb-3"
            prepend-icon="mdi-email"
          ></v-text-field>

          <v-row class="mb-3">
            <v-col md="4">
              <v-select
                v-model="registerForm.userGender"
                :items="genders"
                item-text="value"
                item-value="id"
                label="性別"
                prepend-icon="mdi-gender-male-female"
              ></v-select>
            </v-col>
            <v-col>
              <v-menu
                ref="menu"
                v-model="menu"
                :close-on-content-click="false"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="registerForm.userBirthday"
                    label="生年月日"
                    prepend-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker
                  ref="picker"
                  v-model="registerForm.userBirthday"
                  :max="new Date().toISOString().substr(0, 10)"
                  min="1950-01-01"
                  @change="save"
                  locale="jp-ja"
                  :day-format="date => new Date(date).getDate()"
                ></v-date-picker>
              </v-menu>
            </v-col>
          </v-row>

          <v-text-field
            v-model="registerForm.userPostalCode"
            label="郵便番号"
            required
            class="mb-3"
            prepend-icon="mdi-office-building-marker"
          ></v-text-field>

          <v-text-field
            v-model="registerForm.userState"
            label="都道府県"
            required
            class="mb-3"
            prepend-icon="mdi-city"
          ></v-text-field>

          <v-text-field
            v-model="registerForm.userCity"
            label="市区町村"
            required
            class="mb-3"
            prepend-icon="mdi-city"
          ></v-text-field>

          <v-text-field
            v-model="registerForm.userSuburb"
            label="マンション名・部屋"
            required
            class="mb-3"
            prepend-icon="mdi-home-city"
          ></v-text-field>

          <div align="center" class="mt-5">
            <v-btn text width="250"> 登録を取り消す </v-btn>
            <v-btn color="primary" rounded x-large type="submit" width="250">
              登録する
            </v-btn>
          </div>
        </v-form>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      registerForm: {
        userId: 1,
        userName:"",
        userEmail:"",
        userGender:"",
        userBirthday: "",
        userPostalCode:"",
        userState:"",
        userCity:"",
        userSuburb:"",
      },
      genders:[
        {id: "1", value:'男性'},
        {id: "2", value:'女性'}
      ],
      menu: false,
    };
  },
  watch: {
    menu(val) {
      val && setTimeout(() => (this.$refs.picker.activePicker = "YEAR"));
    },
  },
  methods: {
    formatBithday: function () {
      if (this.birthday.year || this.birthday.month || this.birthday.date) {
        this.birthday.date = `${this.birthday.year}-${this.birthday.month}-${this.birthday.day}`;
      }
    },
    save(date) {
      this.$refs.menu.save(date);
    },
    async register () {
      // authストアのresigterアクションを呼び出す
      await this.$store.dispatch('auth/register', this.registerForm)
      // トップページに移動する
      this.$router.push('/')
    }
  },
};
</script>