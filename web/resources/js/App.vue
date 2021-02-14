<template>
  <v-app>
    <div class="white--text">
      <TheHeaderNavigation />
      <TheSideNavigation />
      <v-btn
        class="secondary"
        to="/sell-product/form"
        :fab="true"
        :large="true"
        :fixed="true"
        :bottom="true"
        :right="true"
      >
        <v-icon>mdi-camera-plus</v-icon>
      </v-btn>
    </div>
    <!-- アプリケーションのコンポーネントに基づいてコンテンツのサイズを決定 -->

    <v-main class="common pt-0 mb-0">
      <!-- アプリケーションに適切なgutterを提供します -->
      <v-container class="pa-0">
        <!-- vue-routerを使用している場合 -->
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>

</template>

<script>
import TheHeaderNavigation from './components/container/TheHeaderNavigation'
import TheSideNavigation from './components/container/TheSideNavigation'

export default {
  components: {
    TheHeaderNavigation,
    TheSideNavigation
  },
  data(){
    return{
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

<style scoped>
.common {
  margin-top: 116px;
  background-color: #fafafa;
}
</style>