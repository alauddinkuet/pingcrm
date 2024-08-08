<template>
  <div class="mt-3 mb-3">
    <input type="text" name="test" class="form-input" value="Async Test Name">
  </div>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue'

let intervalId = 'test'
onMounted(() => {
  intervalId = 'no test'
})

onUnmounted(() => {
})
</script>
