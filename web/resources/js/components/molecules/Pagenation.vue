<template>
  <div class="text-center pt-6">
    <v-pagination
      v-model="page"
      :length="length"
      @input="changePage"
    ></v-pagination>
  </div>
</template>

<script>
export default {
  props: {
    length: Number,
  },
  data() {
    return {
      page: 1
    }
  },
  methods: {
    changePage(pageNumber) {
      this.$emit('change-page', pageNumber)
    } 
  },
}
</script>