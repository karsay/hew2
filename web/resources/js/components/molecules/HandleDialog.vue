<template>
  <v-dialog
    v-model="dialog"
    persistent
    max-width="500px"
  >
    <v-card>
      <v-card-title>
        {{ dialogDetail.title }}
      </v-card-title>
      <v-card-text>
        {{ dialogDetail.text}}
      </v-card-text>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          text
          @click="closeDialog"
        >
          {{ dialogDetail.buttonText }}
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    dialog: Boolean,
    dialogDetail: Object
  },
  methods: {
    closeDialog() {
      this.$emit('close-dialog')
    },
  },
}
</script>

<style scoped>

</style>