<template>
  <v-radio-group
    hide-details
    :value="radio"
    @change="isRadio"
    class="d-flex mx-4 my-0 pa-0 radio"
  >
    <div class="d-flex justify-space-between">
      <v-radio
        class="py-4"
        :value="true"
        
      >
        <template #label>
          <div
            class="text-h6"
            :class="{ 'primary--text': radio }"
          >
            代金引換
          </div>
        </template>
      </v-radio>
      <v-icon :class="{ 'primary--text': radio }">
        mdi-cash-multiple
      </v-icon>
    </div>

    <v-divider></v-divider>
    
    <div class="d-flex justify-space-between">
      <v-radio
        class="py-4"
        :value="false"
      >
        <template #label>
          <div
            class="text-h6"
            :class="{ 'primary--text': !radio }"
          >
            クレジットカード決済
          </div>
        </template>
      </v-radio>
      <v-icon :class="{ 'primary--text': !radio }">
        mdi-credit-card
      </v-icon>
    </div>
  </v-radio-group>
</template>

<script>
export default {
  props: {
    radio: Boolean
  },
  methods: {
    isRadio() {
      this.$emit('is-radio')
    },
  },
}
</script>

<style scoped>

</style>