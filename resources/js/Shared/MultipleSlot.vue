<template>
  <div class="container">
    <header v-if="$slots.header" class="mt-3">
      <slot name="header"></slot>
    </header>
    <main class="mt-3">
      <slot></slot>
    </main>
    <footer class="mt-3">
      <slot name="footer"></slot>
    </footer>
  </div>
</template>
