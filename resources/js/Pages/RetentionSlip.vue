<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropDown from "@/Components/Dropdown.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Boletas de Retención" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                Boletas Retención
            </h2>
        </template>

        <section></section>
    </AuthenticatedLayout>
</template>
