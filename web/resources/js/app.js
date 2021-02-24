// import './bootstrap'

import Vue from 'vue'
import router from './router'
import App from './App.vue'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'
import './bootstrap'

import store from './store'

const createApp = async () => {
  await store.dispatch('auth/currentUser')
  Vue.use(Vuetify);

  new Vue({
    el: '#app',
    vuetify: new Vuetify({
      iconfont: 'mdi',
      breakpoint: {
        thresholds: {
          xs: 340,
          sm: 540,
          md: 800,
          lg: 1200,
        },
      },
      theme: {
        themes: {
          light: {
            primary: '#006946',
            primary_dark: '#004D2C',
            primary_light: '#0A7953',
            secondary: '#AF1B29',
          },
        },
      },
    }),
    router,
    store,
    components: { App },
    template: '<App />'
  })
}

createApp()