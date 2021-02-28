<template>
  <HeaderNavigation
    :title="title"
    :drawer="getDrawer"
    @is-drawer="isDrawer"
    @to-top="toTop"
  />
</template>

<script>
import HeaderNavigation from './../organisms/HeaderNavigation'
import { mapGetters, mapMutations } from 'vuex'

export default {
  components: {
    HeaderNavigation,
  },
  data() {
    return {
      title: 'Relief Market',
    }
  },
  methods: {
    ...mapMutations("navigation", ["isDrawer"]),
    toTop() {
      this.$router.push({ path: '/' }).catch(err => {})
    },
  },
  computed: {
    ...mapGetters("navigation", ["getDrawer"]),
  }
}
</script>