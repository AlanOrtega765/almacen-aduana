<script setup>
import { ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);
</script>

<template>
    <input
        class="border-light-gray outline-none border-none rounded-r-md px-3"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
