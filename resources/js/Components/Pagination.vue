<script setup>
import { Link } from "@inertiajs/vue3";

defineProps(["links"]);
</script>

<template>
    <div class="flex h-12 gap-1">
        <div v-for="link in links">
            <div
                class="bg-just-white px-4 py-3 rounded-md shadow-md text-dark-gray"
                v-if="link.url === null"
                v-html="link.label"
            />
            <Link
                v-else
                :class="
                    link.active
                        ? 'border-2 border-primary bg-just-white px-5 h-full flex items-center rounded-md shadow-md text-primary'
                        : 'bg-just-white px-5 h-full flex items-center rounded-md shadow-md text-primary'
                "
                :href="link.url"
                v-html="link.label"
            />
        </div>
    </div>
</template>
