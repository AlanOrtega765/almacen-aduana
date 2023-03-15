<script setup>
/**
 * Vista creada para Simplificar el codigo y especificar el codigo para el funcionamiento de un inputlabel o una "etiqueta de entrada"
 */
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-sm">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
