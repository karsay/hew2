<template>
  <v-toolbar elevation="2" class="px-0 toolbar-size" absolute bottom>
    <div class="inpu-size">
      <v-text-field
        dense
        class="d-flex align-center"
        outlined
        hide-details
        :value="input"
        @change="handleInput"
        @keyup.enter="sendMessage"
      >
        <template v-slot:append-outer>
          <v-btn
            text
            height="36"
            width="64"
            class="my-auto"
            color="primary"
            @click="sendMessage"
          >
            送信
          </v-btn>
        </template>
      </v-text-field>
    </div>
  </v-toolbar>
</template>

<script>
export default {
  props: {
    input: String,
  },
  methods: {
    handleInput(e) {
      this.$emit('handle-input', e)
    },
    sendMessage() {
      this.$emit('send-message')
    }
  },
}
</script>

<style scoped>
.toolbar-size {
  width: 100%;
}
.inpu-size {
  width: 100%;
}
</style>