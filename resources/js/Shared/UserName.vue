<script setup>
const firstName = defineModel('firstName')
const lastName = defineModel('lastName')
</script>

<template>
  <input type="text" class="form-input mt-2" v-model="firstName" />
  <input type="text" class="form-input mt-3" v-model="lastName" />
</template>
