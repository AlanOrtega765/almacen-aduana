<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Contrabandos" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contrabandos
            </h2>
        </template>
    </AuthenticatedLayout>
</template>
