<template>
  <v-sheet color="primary_dark" class="py-6 px-4">
    <v-row>
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
    <v-row>
      <v-col class="d-flex pt-0 pb-6" cols="2">
        <v-btn
          min-width="102"
          color="white"
          depressed
          class="px-4 py-2 primary--text"
          @click="search"
        >
          検索
        </v-btn>
      </v-col>
    </v-row>
  </v-sheet>
</template>

<script>
export default {
  props: {
    selectItems: Array,
    radioItems: Array
  },
  data() {
    return {
      value: null
    }
  },
  methods: {
    search() {
      this.$emit('search')
    },
  },
}
</script>

<style scoped>

</style>