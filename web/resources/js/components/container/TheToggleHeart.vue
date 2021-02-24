<template>
  <ToggleHeart
    :isHeart="isHeart"
    :buttonText="buttonText"
    @toggle-heart="toggleHeart"
  />
</template>

<script>
import ToggleHeart from '../molecules/ToggleHeart'

export default {
  components: { ToggleHeart },
  data() {
    return {
      isHeart: false,
      buttonText: 'like'
    }
  },
  methods: {
    toggleHeart() {
      this.isHeart = !this.isHeart
    }
  },
}
</script>