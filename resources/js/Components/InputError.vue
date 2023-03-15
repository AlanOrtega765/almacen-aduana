<script setup>
/**
 * Vista creada para Simplificar el codigo y especificar un mensaje de error al ingresar
 */
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red">
            {{ message }}
        </p>
    </div>
</template>
