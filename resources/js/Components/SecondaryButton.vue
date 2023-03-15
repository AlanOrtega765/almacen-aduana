<script setup>
/**
 * Vista creada para Simplificar el codigo y especificar el codigo sobre el funcionamiento de un SecondaryButton
 */
defineProps({
    type: {
        type: String,
        default: "button",
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center px-4 py-3 bg-secondary text-just-white rounded-md font-bold text-xs uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
