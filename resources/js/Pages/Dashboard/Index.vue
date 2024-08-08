<template>
  <div>
    <Head title="Dashboard"/>
    <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
    <button v-bind="objectOfAttrs" @click="increment" class="btn-indigo block float-right mr-2">
      {{ state.count }}
    </button>
    <div :class="classObject">{{ fullName }}</div>

  </div>
  <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
  <TestTextInput @buttonClicked="buttonClick" :callerMessagePassed=organization.name v-model="state.count" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
  <h1>{{ first }} {{ last }}</h1>
  <UserName
    v-model:firstName="first"
    v-model:lastName="last"
  />
  <FancyButton v-slot="{ text, count }">
    {{ text }} {{ count }}
    <span style="color:red">{{ fullName}}</span>
 	</FancyButton>
  <multiple-slot>
    <template #header="headerProps">
      {{ headerProps }}
      <h1>Here might be a page Header title</h1>
    </template>

    <template #default>
      <p>A paragraph for the main content.</p>
      <p>And another one.</p>
    </template>

    <template #footer>
      <p>Here's some contact footer info</p>
    </template>
  </multiple-slot>

<button  @click="modal.show()" class="mt-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Show modal
</button>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Example Modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import { Head } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import { reactive, ref, provide, computed, onMounted } from 'vue'
import FileInput from '@/Shared/FileInput.vue'
import TestTextInput from '@/Shared/TestTextInput.vue'
import TextInput from '@/Shared/TextInput.vue'
import UserName from '@/Shared/UserName.vue'
import FancyButton from '@/Shared/FancyButton.vue'
import MultipleSlot from '@/Shared/MultipleSlot.vue'
import { Modal } from 'flowbite';

export default {

  components: {
    Head,
    TestTextInput,
    FileInput,
    TextInput,
    UserName,
    FancyButton,
    MultipleSlot
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
    buttonClick() {
      this.state.count++;
    }
  },
  setup(props, ctx) {

    const numbers = ref([1, 2, 3, 4, 5])

    const evenNumbers = computed(() => {
      return numbers.value.filter((n) => n % 2 === 0)
    })

    const first = ref('John')
    const last = ref('Doe')

    const items = ref([{ message: 'Foo' }, { message: 'Bar' }])

    const count = ref(0)
    const modal = ref()
    const state = reactive({
      count
    });

    const isActive = ref(true)
    const hasError = ref(false)

    const author = reactive({
      name: 'John Doe',
      books: [
        'Vue 2 - Advanced Guide',
        'Vue 3 - Basic Guide',
        'Vue 4 - The Mystery'
      ]
    })

    // a computed ref
    const publishedBooksMessage = computed(() => {
      return author.books.length > 0 ? 'Yes' : 'No'
    })

    const firstName = ref('John')
    const lastName = ref('Doe')

    const fullName = computed({
      // getter
      get() {
        return firstName.value + ' ' + lastName.value
      },
      // setter
      set(newValue) {
        // Note: we are using destructuring assignment syntax here.
        [firstName.value, lastName.value] = newValue.split(' ')
      }
    })
    provide('first_name', firstName)

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



    const object = { id: ref(1) };

    const books = reactive([ref('Vue 3 Guide')])


    state.count = 1
    let seen = ref(true);
    let objectOfAttrs = reactive({
      id: 'container',
      class: 'wrapper',
      style: 'background-color:green'
    });

    const classObject = reactive({
      active: true,
      'text-danger': hasError
    })

    const obj = ref({
      nested: {
        count: 0
      },
      arr: ['foo', 'bar']
    });

    function increment() {


      modal.value.toggle();
      state.count++
      seen.value = !seen.value;
      objectOfAttrs.style = 'background-color:red';
      fullName.value = 'Alauddin Husain';
      hasError.value = true;
    }


    const sets = ref([
      [1, 2, 3, 4, 5],
      [6, 7, 8, 9, 10]
    ])

    function even(numbers) {
      return numbers.filter((number) => number % 2 === 0)
    }

    // don't forget to expose the function as well.
    return {
      state,
      increment,
      publishedBooksMessage,
      objectOfAttrs,
      seen,
      fullName,
      classObject,
      isActive,
      hasError,
      items,
      evenNumbers,
      even,
      sets,
      first,
      last,
      modal
    }
  },
  watch: {
    state: {
      handler: function () {
        console.error('changed state');
      },
    },
    objectOfAttrs: {
      deep: true,
      handler: function () {
        console.error('changed objectOfAttrs');
      },
    },
  },
}
</script>
