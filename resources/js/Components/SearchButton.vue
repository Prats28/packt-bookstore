<script setup>
import {MagnifyingGlassCircleIcon} from "@heroicons/vue/20/solid/index.js";

const props = defineProps(['hasSearchFields','href']);
const navigateToLink = () => {
  window.location.href = props.href;
};
</script>
<template>
    <button @click="navigateToLink"
        :href="props.href"
        class="inline-flex items-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold ring-1 ring-inset mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <MagnifyingGlassCircleIcon class="h-6 w-6" aria-hidden="true"/>
        <span class="ml-1" v-if="!hasSearchFields">Search</span>
        <span class="ml-1" v-else>Refine Search</span>
    </button>
</template>
