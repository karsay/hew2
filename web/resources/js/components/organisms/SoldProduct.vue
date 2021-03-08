<template>
  <v-card class="mt-6" min-height="312">
    <v-toolbar color="primary" max-height="64" min-height="64" dark>
      <v-tabs
        v-model="tab"
        class="px-0"
      >
        <v-tabs-slider color="white"></v-tabs-slider>

        <v-tab
          class="tab-size"
          v-for="item in items"
          :key="item.tab"
        >
          {{ item.tab }}
        </v-tab>
      </v-tabs>
    </v-toolbar>
    
    <v-tabs-items v-model="tab">
      <v-tab-item
        v-for="item in items"
        :key="item.tab"
      >
        <v-sheet>
          <component :is="item.content"></component>
        </v-sheet>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>

<script>
import InProduction from './InProduction'
import ProductionInProgress from './ProductionInProgress'
import AfterProduction from './AfterProduction'

export default {
  components: {
    InProduction,
    ProductionInProgress,
    AfterProduction
  },
  data() {
    return {
      tab: 0,
      items: [
        {
          tab: '出品中',
          content: 'InProduction',
        },
        {
          tab: '取引中',
          content: 'ProductionInProgress',
        },
        {
          tab: '取引済み',
          content: 'AfterProduction',
        },
      ]
    }
  },
}
</script>

<style lang="scss" scoped>

.tab-size {
  margin: 0 auto;
  width: 100%
}
</style>