<template>
  <div>
    <Teleport to="#modal-content">
      <div v-if="openModal" class="teleport-modal text-white px-6 py-5 rounded">
        <p>Hello from the modal!</p>
        <button @click="$emit('hideModal')" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow my-4">Close</button>
      </div>
    </Teleport>
    <Teleport to="#modal-content">
      <div v-if="openModal" class="teleport-modal text-white px-6 py-5 rounded-b border-t">
        <p>Hello from the second part of the modal!</p>
      </div>
    </Teleport>
  </div>
</template>
<script setup>
import { ref, defineProps } from 'vue'
defineProps({
  openModal: Boolean
})
</script>
<style>
 #modal-content {
  position: fixed;
  z-index: 999;
  top: 20%;
  left: 50%;
  width: 300px;
  margin-left: -150px;
  background-color:black;
}
</style>
