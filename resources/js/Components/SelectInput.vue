<script setup>
import { ref } from "vue";

defineProps(["modelValue", "options"]);

defineEmits(["update:modelValue"]);

const input = ref(null);
</script>

<template>
    <select
        class="rounded border-gray hover:border-dark-gray outline-none focus:border-gray focus:ring-0 cursor-pointer transition-colors duration-200"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
        :value="modelValue"
    >
        <option
            v-for="(option, index) in options"
            :key="index"
            :value="option.value"
            :selected="option.selected"
            v-html="option.name"
        ></option>
    </select>
</template>
