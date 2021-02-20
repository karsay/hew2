<template>
  <v-card class="px-4 py-6">
    <v-select
      v-for="selectItem in selectItems"
      :key="selectItem.prop"
      v-model="selectItem.selected"
      @change="setSelectItems(selectItem.prop, selectItem.selected)"
      :label="selectItem.subText"
      :items="selectItem.item"
      outlined
    >
    </v-select>
  </v-card>
</template>

<script>
export default {
  props: {
    selectItems: Array,
    selectedItems: Array
  },
  methods: {
    setSelectItems(prop, selected) {
      this.$emit('set-select-items', { prop, selected })
    },
  },

}
</script>