<template>
  <div>
    <Head title="Product" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Product Detail</h2>
      </template>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <h3 class="text-2xl font-semibold mb-4">{{ props.product.title }}</h3>

              <div class="grid grid-cols-3 gap-10">
                <div class="col-span-1">
                  <div class="flex items-center">
                    <div class="w-15 h-15 flex items-center">
                      <img :src="props.product.image" alt="Product Image" />
                    </div>
                  </div>
                </div>

                <div class="col-span-1">
                  <div class="space-y-2">
                    <div>
                      <strong>Author:</strong> {{ props.product.author }}
                    </div>
                    <div>
                      <strong>Genre:</strong> {{ props.product.genre }}
                    </div>
                    <div>
                      <strong>ISBN:</strong> {{ props.product.isbn }}
                    </div>
                    <div>
                      <strong>Publisher:</strong> {{ props.product.publisher }}
                    </div>
                    <div>
                      <strong>Published:</strong> {{ props.product.published }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-4">
                <strong>Description:</strong>
                <p>{{ props.product.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  product: Object,
});
</script>
