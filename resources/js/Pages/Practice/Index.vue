<template>
  <div>
    <Head title="Practice"/>
    <h1 class="mb-8 text-3xl font-bold">Practice</h1>
  </div>

  <UserName
    v-model:firstName="first"
    v-model:lastName="last"
  />
  <p class="mt-3 mb-2" style="white-space: pre-line;">Message is: {{ message }}</p>

  <textarea v-model="message" v-focus class="form-input" placeholder="Edit me"></textarea>

  <button @click="modal.show()"
          class="mt-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          type="button">
    Show modal
  </button>

  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true"
       class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Example Modal
          </h3>
          <button type="button"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="default-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4 text-base leading-relaxed text-gray-500 dark:text-gray-400" v-html="modalHtml">
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
          <button data-modal-hide="default-modal" type="button"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            I accept
          </button>
          <button data-modal-hide="default-modal" type="button"
                  class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Decline
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-3">
    <div class="mb-2">Checked names: {{ checkedNames }}</div>

    <input type="checkbox" id="jack" value="Jack" v-model="checkedNames"/>
    <label for="jack" class="ms-1 me-4">Jack</label>

    <input type="checkbox" id="john" value="John" v-model="checkedNames"/>
    <label for="john" class="ms-1 me-4">John</label>

    <input type="checkbox" id="mike" value="Mike" v-model="checkedNames"/>
    <label for="mike" class="ms-1 me-4">Mike</label>
  </div>
  <partial></partial>
  <div class="mt-3">
    Parent Mouse position is at: {{ x }}, {{ y }}
  </div>
  <AsyncComp></AsyncComp>
  <button @click="loadModal(modal)"
          class="mt-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          type="button">
    Load modal
  </button>
  <div class="mt-3">{{ data }}::: {{ error }}</div>
  <h1 class="mt-3">{{ $translate('email.dear') }}</h1>
  <Tabs/>
  <div v-html="__('Signed Contract Document')"></div>
  <div>{{ __('Signed Contract Document') }}</div>
  <TeleportModal @hideModal="openModal = false" :open-modal="openModal"></TeleportModal>
  <button @click="openModal = true" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded my-3">Open Teleport Modal</button>
</template>

<script>
import { useMouse, useFetch } from '../../export'
import {Modal} from 'flowbite';
import axios from 'axios';
import {Head} from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import {ref, onMounted, defineAsyncComponent} from 'vue'
import FileInput from '@/Shared/FileInput.vue'
import TestTextInput from '@/Shared/TestTextInput.vue'
import TextInput from '@/Shared/TextInput.vue'
import FancyButton from '@/Shared/FancyButton.vue'
import UserName from '@/Shared/UserName.vue'
import Partial from '@/Pages/Practice/Partial.vue'
import Tabs from '@/Pages/Practice/Tabs/Tabs.vue'
import TeleportModal from '@/Pages/Practice/TeleportModal.vue'

const AsyncComp = defineAsyncComponent(() =>
    import('../Practice/AsyncLoad.vue')
)

export default {

  components: {
    Head,
    TestTextInput,
    FileInput,
    TextInput,
    FancyButton,
    UserName,
    Partial,
    AsyncComp,
    Tabs,
    TeleportModal
  },
  props: {organization: Object},
  data() {
    return {
      form: this.$inertia.form({
        name: this.organization.name,
      }),
    }
  },
  layout: Layout,
  methods: {
    hideModal() {
      this.modalOpen = false;
    },
    async loadModal(modal) {
      const response = await axios.post('practice/partial', {}).then(response => {
        console.error(response.data.success);
        this.modalHtml = response.data.html;
        modal.show();
      });
      this.url = 'practice/partial1'

      //this.loadComponent();
      /*const page = usePage()
      console.error(page.props);
      const response = await fetch("practice/partial", {
        method: "POST",
        headers: {'X-CSRF-TOKEN': page.props.csrf_token, 'Content-Type': 'application/json'},
      }).then(response => {
        return response.json();
      }).then((data) => {
        console.error(data.success);
      });*/
      //modal.show();
    },
    loadComponent() {
      this.AsyncLoad = defineAsyncComponent(() =>
      import('../Practice/AsyncLoad.vue')
      )
    },
  },
  directives: {
    focus: {
      //mounted: (el) => { el.focus() },
      mounted(el, binding, vnode) {el.focus()},
    },
  },
  setup(props, ctx) {

    const checkedNames = ref([])
    const modal = ref()
    const AsyncLoad = ref()
    const url = ref('practice/partial');
    const first = ref('John')
    const last = ref('Doe')
    const message = ref('Edit Me')
    const modalHtml = ref('Modal html');
    const openModal = ref(false)

    const { x, y } = useMouse()
    const { data, error } = useFetch(url)

    onMounted(() => {
      const options = {
        placement: 'bottom-right',
        backdrop: 'dynamic',
        backdropClasses:
          'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
        closable: true,
        onHide: () => {
          console.log('modal is hidden');
        },
        onShow: () => {
          console.log('modal is shown');
        },
        onToggle: () => {
          console.log('modal has been toggled');
        },
      };

      // instance options object
      const instanceOptions = {
        id: 'default-modal',
        override: true
      };

      modal.value = new Modal(document.querySelector('#default-modal'), options, instanceOptions);
    });

    return {
      first,
      last,
      message,
      checkedNames,
      modal,
      modalHtml,
      AsyncLoad,
      x,
      y,
      data,
      error,
      url,
      openModal
    }
  },
  watch: {},
}
</script>
