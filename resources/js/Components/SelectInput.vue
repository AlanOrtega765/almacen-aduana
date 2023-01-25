<script setup>
import { ref } from "vue";

defineProps(["modelValue", "options"]);

defineEmits(["update:modelValue"]);

const input = ref(null);
</script>

<template>
    <select
        class="appearance-none rounded border-gray focus:border-gray hover:border-dark-gray cursor-pointer transition-colors duration-200"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
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
