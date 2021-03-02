<template>
  <v-card-actions>
    <v-btn
      v-if="! isFirstPage"
      :ripple="{ class: 'primary--text'}"
      @click="pagenation"
    >
      <v-icon>
        mdi-chevron-left
      </v-icon>
      prev
    </v-btn>

    <v-btn
      v-if="! isLastPage"
      :ripple="{ class: 'primary--text'}"
      @click="pagenation"
    >
      next
      <v-icon>
        mdi-chevron-right
      </v-icon>
    </v-btn>
  </v-card-actions>
</template>

<script>

export default {
  props: {
    currentPage: {
      type: Number,
      required: true
    },
    lastPage: {
      type: Number,
      required: true
    }
  },
  methods: {
    pagenation() {
      this.$router.push({
        name: 'productList',
        query: {
          productName: this.$route.query.productName,
          page: this.currentPage,
        }
      })
    },
  },
  computed: {
    isFirstPage () {
      return this.currentPage === 1
    },
    isLastPage () {
      return this.currentPage === this.lastPage
    }
  }
}
</script>