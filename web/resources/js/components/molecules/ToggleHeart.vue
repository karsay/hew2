<template>
  <v-btn-toggle
    borderless
    :value="isHeart"
    @change="toggleHeart"
  >
    <v-btn
      text
      small
      class="text-caption"
      :class="{ 'secondary--text': isHeart }"
    >
      <v-icon
        small
        class="pr-1"
        :class="{ 'secondary--text': isHeart, 'text--secondary': !isHeart }"
      >
        mdi-heart
      </v-icon>
      {{ buttonText }}
    </v-btn>
  </v-btn-toggle>
</template>

<script>
export default {
  props: {
    isHeart: Boolean,
    buttonText: String
  },
  methods: {
    toggleHeart() {
      this.$emit('toggle-heart')
    },
  },
}
</script>

<style scoped>

</style>