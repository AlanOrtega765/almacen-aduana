<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
    props.active
        ? 'block text-just-white font-bold bg-secondary w-full py-2 rounded-lg pl-4'
        : 'block text-just-white font-bold w-full py-2 rounded-lg pl-4'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
