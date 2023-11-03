<script setup>
import {ref} from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import Table from '@/Components/Table.vue';
import TablePagination from '@/Components/TablePagination.vue';
import PrimaryLightButton from '@/Components/PrimaryLightButton.vue';
import SearchButton from '@/Components/SearchButton.vue';

const props = defineProps(['Products', 'hasSearchFields'])

console.log(props);

const tableColumns = ref([
    {key: 'id', label: 'Id'},
    {key: 'title', label: 'Title'},
    {key: 'isbn', label: 'Isbn'},
    {key: 'author', label: 'Author'},
    {key: 'genre', label: 'Genre'},
    {key: 'published', label: 'Published'},
    {key: 'publisher', label: 'publisher'},
    {key: 'action', label: 'Action'}
]);

</script>
<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Products</h2>
    </template>
        <div>
            <div class="max-w-7xl mx-auto py-4 sm:py-10 px-4 sm:px-6 lg:px-8">
            <div class="bg-white py-3 shadow-lg overflow-hidden rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h3 class="text-base sm:text-xl font-semibold leading-6 text-gray-900 dark:text-white">Products</h3>
                    </div>
                    <div class="mt-2 sm:mt-4 sm:ml-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <div class="py-2 flex">
                        <div class="flex pl-2 sm:pl-4">
                            <SearchButton class="mr-3" :href="hasSearchFields == '' ? route('product.search') : route('product.search')+'?'+hasSearchFields" :hasSearchFields="hasSearchFields"></SearchButton>
                        </div>
                        <PrimaryLightButton v-if="hasSearchFields" :bgColor="'red'" class="ring-1 px-3 py-2 inline-flex items-center " :href="route('client.lists')">
                            <span class="mr-1">X</span>Clear
                        </PrimaryLightButton>
                    </div>
                    </div>
                </div>
                <div>
                     <Table :columns="tableColumns" :data="Products.data">
                        <template v-for="column in tableColumns" v-slot:[column.key]="{ item }">
                          <div v-if="column.key === 'title'" class="flex flex-col whitespace-normal break-all">
                            {{ item.title }}
                          </div>
                          <div v-if="column.key === 'isbn'">
                            <span v-if="item.isbn"
                                :style="{ backgroundColor:'gray', color: '#FFFFFF' }"
                                class="text-xs font-medium mr-2 px-3.5 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300" >
                                {{ item.isbn }}
                            </span>
                          </div>
                          <div v-if="column.key === 'author'" class="flex flex-col whitespace-normal break-all">
                            {{ item.author }}
                          </div>
                          <div v-if="column.key === 'genre'" class="flex flex-col whitespace-normal break-all">
                            {{ item.genre }}
                          </div>

                          <div v-if="column.key === 'published'" class="flex flex-col whitespace-normal break-all">
                            {{ item.published }}
                          </div>
                          <div v-if="column.key === 'publisher'" class="flex flex-col whitespace-normal break-all">
                            {{ item.publisher }}
                          </div>
                          <div v-if="column.key === 'action'">
                              <PrimaryLightButton :href="route('product.view', item.id)" class="text-indigo-600 hover:text-indigo-900 mr-4" aria-label="View">View</PrimaryLightButton>
                          </div>
                        </template>
                    </Table>
                </div>

                <div class="border-t border-gray-200 pt-3 sm:pt-5 mb-5">
                    <TablePagination :paginationMeta="Products.meta" v-if="props.Products.meta.total > 8" />
                </div>
                </div>
            </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <Footer></Footer>
  </template>


