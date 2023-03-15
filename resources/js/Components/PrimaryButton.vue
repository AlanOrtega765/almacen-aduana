<script setup>
/**
 * Vista creada para Simplificar el codigo y especificar el codigo sobre el funcionamiento de un PrimaryButton
 */
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center justify-center px-4 py-3 bg-primary border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary text-just-white focus:ring-offset-2 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
