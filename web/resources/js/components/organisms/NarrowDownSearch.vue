<template>
  <v-sheet color="primary_dark" class="py-6 px-4">
    <v-row class="pb-6">
      <v-col cols="2" class="d-flex flex-column">
        <div>
          <div class="text-h5 white--text">
            キーワード
          </div>
          <ProductSearch
            class="pt-0"
            :input="input"
            @search="search"
            @input-handle="inputHandle"
          />
        </div>
        <v-spacer></v-spacer>
        <v-btn
          width="102"
          color="white"
          depressed
          class="px-4 mt-auto primary--text"
          @click="search"
        >
          検索
        </v-btn>
      </v-col>
      <v-col cols="2" class="pb-0">
        <v-select
          v-for="selectItem in selectItems"
          :key="selectItem.prop"
          v-model="selectItem.selected"
          :label="selectItem.subText"
          :items="selectItem.items"
          item-text="item"
          item-value="id"
          color="white"
          background-color="primary mb-4"
          return-object
          hide-details
          outlined
          flat
          dark
        >
        </v-select>
      </v-col>
      <v-col class="d-flex py-4">
        <div
          v-for="radioItem in radioItems"
          :key="radioItem.label"
          class="mr-6"
        >
          <div class="text-h5 white--text">
            {{ radioItem.label }}
          </div>
          <v-radio-group
            v-model="radioItem.selected.key"
            class="pt-0 mt-2"
            hide-details
          >
            <v-radio
              dark
              v-for="items in radioItem.items"
              :key="items.key"
              class="pa-0"
              :label="items.item"
              :value="items.key"
            >
            </v-radio>
          </v-radio-group>
        </div>
      </v-col>
    </v-row>
  </v-sheet>
</template>

<script>
import ProductSearch from '../molecules/ProductSearch'

export default {
  components: {
    ProductSearch,
  },
  props: {
    input: '',
    selectItems: Array,
    radioItems: Array
  },
  methods: {
    search() {
      this.$emit('search', this.input)
    },
    inputHandle(input) {
      this.$emit('input-handle', input)
    }
  },
}
</script>

<style scoped>

</style>