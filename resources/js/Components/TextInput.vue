<script setup>
import { ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);
</script>

<template>
    <input
        class="focus:border-primary focus:ring-primary rounded-md shadow-md"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
