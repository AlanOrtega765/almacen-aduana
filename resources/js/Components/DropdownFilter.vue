<script setup>
/**
 * Vista creada para Simplificar el codigo y especificar el codigo sobre el funcionamiento del filtro de un Dropdown
 */

import { computed, onMounted, onUnmounted, ref } from "vue";

const props = defineProps({
    align: {
        default: "right",
    },
    width: {
        default: "48",
    },
    contentClasses: {
        default: () => ["py-1", "bg-white"],
    },
});

const closeOnEscape = (e) => {
    if (open.value && e.key === "Escape") {
        open.value = false;
    }
};

onMounted(() => document.addEventListener("keydown", closeOnEscape));
onUnmounted(() => document.removeEventListener("keydown", closeOnEscape));

const widthClass = computed(() => {
    return {
        48: "w-48",
    }[props.width.toString()];
});

const alignmentClasses = computed(() => {
    if (props.align === "left") {
        return "origin-top-left left-0";
    } else if (props.align === "right") {
        return "origin-top-right right-0";
    } else {
        return "origin-top";
    }
});

const open = ref(false);
</script>

<template>
    <div class="relative">
        <div
            class="flex items-center cursor-pointer bg-just-white rounded-l-md px-3 py-2"
            @click="open = !open"
        >
            <slot name="trigger" />
        </div>

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 mt-2 rounded-md shadow-lg bg-just-white"
                :class="[widthClass, alignmentClasses]"
                style="display: none"
            >
                <div class="rounded-md" :class="contentClasses">
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>
