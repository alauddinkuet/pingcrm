<script setup>
import { inject } from 'vue'
const firstName = inject('first_name')

const greetingMessage = 'Hurray'

</script>

<template>
  <button class="fancy-btn">
    <slot :text="greetingMessage" :count="1"></slot> <!-- slot outlet -->
  </button>
  {{ firstName }}
</template>

<style>
.fancy-btn {
  color: #fff;
  background: linear-gradient(315deg, #42d392 25%, #647eff);
  border: none;
  padding: 5px 10px;
  margin: 5px;
  border-radius: 8px;
  cursor: pointer;
}
</style>
