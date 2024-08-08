<template>
  <div class="mt-3">
    <input type="text"  name="test" class="form-input" placeholder="This should be focused">
  </div>
  <AsyncComp></AsyncComp>
  <div>
    Mouse position is at: {{ x }}, {{ y }}
  </div>
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3" @click="show = !show">Toggle Show/Hide</button>
  <Transition name="slide-fade" @before-enter="onBeforeEnter">
    <p v-if="show" class="border p-3 rounded">Show/Hide Me with Transition</p>
  </Transition>
  <div>
    <Transition name="slide-up">
        <button v-if="docState === 'saved'"
                @click="docState = 'edited'"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded my-3">Edit</button>
        <button v-else-if="docState === 'edited'"
                @click="docState = 'editing'"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded my-3">Save</button>
        <button v-else-if="docState === 'editing'"
                @click="docState = 'saved'"
                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3">Cancel</button>
      </Transition>
    </div>
</template>

<script setup>
  import { useMouse1 } from '../../export'
  import { onMounted, onUnmounted, defineAsyncComponent, ref } from 'vue'
  const AsyncComp = defineAsyncComponent(() =>
    import('../Practice/AsyncLoad.vue')
  )
  const show = ref(true)
  const docState = ref('saved');
  const { x, y } = useMouse1()
  const vFocus = {
    mounted: (el) => el.focus()
  }
  let intervalId = 'test'
  onMounted(() => {
    intervalId = 'no test'
  })

  onUnmounted(() => {
  })
function onBeforeEnter(el) { alert('called on before enter'); }
</script>
<style scoped>
  .v-enter-active,
  .v-leave-active {
    transition: opacity 0.5s ease;
  }

  .v-enter-from,
  .v-leave-to {
    opacity: 0;
  }
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.5s ease;
  }

  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }

  /*
  Enter and leave animations can use different
  durations and timing functions.
  */
  .slide-fade-enter-active {
    transition: all 0.3s ease-out;
  }

  .slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
  }

  .slide-fade-enter-from,
  .slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
  }
  .btn-container {
    display: inline-block;
    position: relative;
    height: 1em;
  }

  .slide-up-enter-active,
  .slide-up-leave-active {
    transition: all 0.25s ease-out;
  }

  .slide-up-enter-from {
    opacity: 0;
    transform: translateY(30px);
  }

  .slide-up-leave-to {
    opacity: 0;
    transform: translateY(-30px);
  }
</style>
