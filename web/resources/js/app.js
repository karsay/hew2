import Vue from 'vue'
import router from './router'
import App from './App.vue'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify);

new Vue({
  el: '#app',
  vuetify: new Vuetify({
    iconfont: 'mdi',
  }),
  router,
  components: { App },
  template: '<App />'
})