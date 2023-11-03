<template>
    <div class="inline-flex hidden sm:flex sm:flex-1 sm:items-center sm:justify-between mt-2 float-left">
        <div>
            <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">{{ paginationMeta.from }}</span>
                to
                <span class="font-medium">{{ paginationMeta.to }}</span>
                of
                <span class="font-medium">{{ paginationMeta.total }}</span>
                results
            </p>
        </div>
    </div>
    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm float-right" aria-label="Pagination">
    <span v-for="(link, p) in paginatedLinks" :key="p">
      <Link v-if="link.label.includes('Previous')"
            :href="link.url"
            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
      >
        <span class="sr-only">Previous</span>
        <ChevronLeftIcon class="h-5 w-5" aria-hidden="true"/>
      </Link>

      <Link v-else-if="link.label.includes('Next')"
            :href="link.url"
            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
      >
        <span class="sr-only">Next</span>
        <ChevronRightIcon class="h-5 w-5" aria-hidden="true"/>
      </Link>

      <Link v-else :href="link.url" :class="getClass(link)">{{ link.label }}</Link>
    </span>
    </nav>
</template>

<script setup>
import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/vue/20/solid';
import {Link} from '@inertiajs/vue3';
import {ref, defineProps, computed} from 'vue';

const {paginationMeta} = defineProps(['paginationMeta']);

const paginatedLinks = computed(() => {
  const links = paginationMeta.links;
  const totalLinks = links.length;

  if (totalLinks <= 10) return links;

  const indexWithActiveTrue = links.findIndex(obj => obj.active === true);
  if (indexWithActiveTrue >= 3 && indexWithActiveTrue < totalLinks - 4) {
    const start = indexWithActiveTrue - 1;
    const end = indexWithActiveTrue + 2;
    const slicedLinks = links.splice(0, 1).map((link) => ({
        ...link,
        hidden: false,
    }));
    const slicedLinksArrays = links.slice(start, end).map((link) => ({
        ...link,
        hidden: false,
    }));
    const paginationDots = { label: '...', active: false, hidden: false };
    const newLinks = links.slice(0, 0).concat(slicedLinks).concat(slicedLinksArrays).concat(paginationDots);
    return newLinks.concat(links.slice(-4)).map((link) => ({
      ...link,
      hidden: true,
    }));
  }
  return links.slice(0, 4).concat({ label: '...', active: false, hidden: false }).concat(links.slice(-4)).map((link) => ({
    ...link,
    hidden: true,
  }));
});

const getClass = (link) => {
    if (link.active) {
        return 'relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600';
    }
    return 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0';
};
</script>
