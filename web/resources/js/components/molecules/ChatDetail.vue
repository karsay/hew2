<template>
  <div class="size">
    <div class="d-flex images">
      <v-img
        v-for="image in images"
        :key="image.image_path"
        :src="'/storage/' + image.image_path" width="150" height="150"></v-img>
    </div>
    <v-col cols="12" class="d-flex flex-wrap">
      <ChatDetailItem
        v-for="detail in details"
        :key="detail.label"
        :label="detail.label"
        :productItem="detail.productItem"
      />
      <div class="card__textarea pa-2">
        <p class="text-body-1">
          {{ description }}
        </p>
      </div>
    </v-col>
  </div>
</template>

<script>
import ChatDetailItem from '../molecules/ChatDetailItem'

export default {
  components: {
    ChatDetailItem,
  },
  props: {
    description: String,
    details: Array,
    images: Array
  },
    mounted () {
    console.log('ChildComponentは表示状態です')
  },
  beforeDestroy () {
    console.log('ChildComponentは非表示状態です')
  }
}
</script>

<style scoped>
.images {
  overflow: scroll;
}
.item-size {
  width: 40%;
}
</style>