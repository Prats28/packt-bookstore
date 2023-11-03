<script setup>

import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
    bgColor: {
        type: String,
        default: 'indigo', // Default to indigo if not provided
    },
});

const bgColorClass = `bg-${props.bgColor}-50`;
const hoverBgColorClass = `hover:bg-${props.bgColor}-100`;
const textClass = `text-${props.bgColor}-600`;
const navigateToLink = () => {
  window.location.href = props.href;
};
</script>

<template>
    <button
        :class="[
            'rounded',
            bgColorClass, // Use the bgColorClass variable
            'px-2 py-2 text-sm font-semibold',
            textClass,
            'shadow-sm',
            hoverBgColorClass, // Use the hoverBgColorClass variable
        ]"
        class="mr-2"
        @click="navigateToLink"
        :href="props.href"
    >
        <slot />
    </button>
</template>
