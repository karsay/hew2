<template>
  <div>
    <v-img
      :src="`/storage/${selectData.product_image}`"
      class="product-img"
      @click="toProductDetail"
    ></v-img>
    <div class="text-caption text--secondary pa-1">
      ※ 画像をクリックすると商品詳細ページへ遷移します。
    </div>

    <div>

    <v-stepper
      :value="stepState"
      @change="setStep"
      vertical
    >
      <v-stepper-step
        :complete="steps[0].id > 1"
        step="1"
      >
        {{ steps[0].state }}
      </v-stepper-step>
      <v-stepper-content step="1">
        <v-btn
          v-if="selectData.product_is_selled == 0"
          @click="setStep(2)"
          color="primary"
        >complete</v-btn>
        <v-btn
          v-else-if="selectData.product_is_selled == 1"
          @click="setStep(2)"
          disabled
          color="primary"
        >wait</v-btn>
      </v-stepper-content>

      <v-stepper-step
        :complete="steps[1].id > 2"
        step="2"
      >
        {{ steps[1].state }}
      </v-stepper-step>
      <v-stepper-content step="2">
        <v-btn
          v-if="selectData.product_is_selled == 1"
          @click="setStep(3)"
          color="primary"
        >complete</v-btn>
        <v-btn
          v-else-if="selectData.product_is_selled == 0"
          @click="setStep(3)"
          disabled
          color="primary"
        >wait</v-btn>
      </v-stepper-content>
      
      <v-stepper-step
        :complete="steps[2].id > 3"
        step="3"
      >
        {{ steps[2].state }}
      </v-stepper-step>
      <v-stepper-content step="3">
        <v-btn
          v-if="selectData.product_is_selled == 1"
          @click="setStep(4)"
          color="primary"
        >complete</v-btn>
        <v-btn
          v-else-if="selectData.product_is_selled == 0"
          disabled
          color="primary"
        >wait</v-btn>
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
    stepState: String,
    selectData: Object
  },
  data() {
    return {
    }
  },

  methods: {
    toProductDetail() {
      this.$emit('to-product-detail')
    },
    setStep(step) {
      console.log(step);
      this.$emit('set-step', typeof step == "string" ? step : String(step))
    }
  },
}
</script>

<style lang="scss" scoped>
.product-img {
  cursor: pointer;
  object-fit: cover;
  height: 200px;
}
</style>