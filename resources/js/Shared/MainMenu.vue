<template>
  <div>
    <div class="mb-2">
      <Link class="group flex items-center py-3" :href="route('dashboard')">
        <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
      </Link>
    </div>
    <div class="mb-2">
      <Link class="group flex items-center py-3" :href="route('organizations')">
        <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Organizations</div>
      </Link>
    </div>
    <div class="mb-2">
      <Link class="group flex items-center py-3" :href="route('contacts')">
<!--        <font-awesome-icon class="text-white mr-2" icon="fa-solid fa-address-book" />-->
        <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('contacts') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Contacts</div>
      </Link>
    </div>
    <div class="mb-2">
      <Link class="group flex items-center py-3" :href="route('products')">
        <i class="fa-brands fa-product-hunt mr-2 w-4 h-4" :class="isUrl('products') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"></i>
        <div :class="isUrl('products') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Products</div>
      </Link>
    </div>
    <div class="mb-2">
      <Link class="group flex items-center py-3" :href="route('reports')">
        <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>
      </Link>
    </div>
    <div class="mb-2">
      <Link class="group flex items-center py-3" :href="route('practice')">
        <i class="fa-solid fa-flask mr-2 w-4 h-4" :class="isUrl('practice') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"></i>
        <div :class="isUrl('practice') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Practice</div>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
<style scoped>
  i {
    color:#7886d7;
  }
  i.fill-white {
    color:#ffffff;
  }
</style>
