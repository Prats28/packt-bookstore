<script>
import {defineComponent, ref} from 'vue';

export default defineComponent({
   props: {
       columns: {
           type: Array,
           required: true
       },
       data: {
           type: Array,
           required: true
       }
   },
   setup(props) {
       // Convert props to refs for reactivity
       const columns = ref(props.columns);
       const data = ref(props.data);
       console.log(data);

       return {columns, data};
   }
});
</script>

<template>
    <div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300  dark:bg-gray-800">
                        <thead>
                        <tr>
                            <th v-for="column in columns" :key="column.key"
                                class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900  dark:text-white sm:pl-0">
                                {{ column.label }}
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0  dark:text-white">
                                <span class="sr-only">action</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-800">
                        <tr v-for="item in data" :key="item.id">
                            <td v-for="column in columns" :key="column.key"
                                class="whitespace-nowrap px-3 py-5 text-sm text-gray-500 text-center dark:text-white">
                                <slot :name="column.key" v-bind="{ item: item }">
                                    {{ item[column.key] }}
                                </slot>
                            </td>
                            <!-- <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                    class="sr-only"></span></a>
                            </td> -->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
