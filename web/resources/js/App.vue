<template>
  <v-app>
    <TheNavigation />
    <!-- アプリケーションのコンポーネントに基づいてコンテンツのサイズを決定 -->

    <v-main>
      <!-- アプリケーションに適切なgutterを提供します -->
      <v-container class="pa-0">
        <!-- vue-routerを使用している場合 -->
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>

</template>

<script>
import TheNavigation from './components/container/TheNavigation'

export default {
  components: {
    TheNavigation
  },
  data(){
    return{
      drawer: null,
      supports:[
        '1',
        '2',
        '3',
        '4',
        '5'
      ]
    }
  },

}
</script>