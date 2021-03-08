<template>
  <div>
    <v-img
      :src="'/storage/image17.jpg'"
      class="product-img"
      @click="toProductDetail"
    ></v-img>
    <div class="text-caption text--secondary pa-1">
      ※ 画像をクリックすると商品詳細ページへ遷移します。
    </div>

    <div>

    <v-stepper
      v-model="stepState"
      vertical
    >
      <v-stepper-step
        :complete="steps[0].id > 1"
        step="1"
      >
        {{ steps[0].state }}
      </v-stepper-step>
      <v-stepper-content step="1">
        <v-btn @click="stepState = 2" color="primary">complete</v-btn>
      </v-stepper-content>

      <v-stepper-step
        :complete="steps[1].id > 2"
        step="2"
      >
        {{ steps[1].state }}
      </v-stepper-step>
      <v-stepper-content step="2">
        <v-btn @click="stepState = 3" color="primary">complete</v-btn>
      </v-stepper-content>
      
      <v-stepper-step
        :complete="steps[2].id > 3"
        step="3"
      >
        {{ steps[2].state }}
      </v-stepper-step>
      <v-stepper-content step="3">
        <v-btn color="primary">complete</v-btn>
      </v-stepper-content>
    </v-stepper>
  </div>
  </div>
</template>

<script>
// ユーザーidと商品データに入っているユーザーのidが一致しなければボタンを押せないようにする


export default {
  props: {
    steps: Array,
  },
  data() {
    return {
      stepState: 1
    }
  },
  // computed: {
  //   getStepState() {
      
  //   }
  // },
  methods: {
    toProductDetail() {
      this.$emit('to-product-detail')
    },
  },
    mounted () {
    console.log('ChildComponentは表示状態です')
  },
  beforeDestroy () {
    console.log('ChildComponentは非表示状態です')
  }
}
</script>

<style lang="scss" scoped>
.product-img {
  cursor: pointer;
  object-fit: cover;
  height: 200px;
}
</style>