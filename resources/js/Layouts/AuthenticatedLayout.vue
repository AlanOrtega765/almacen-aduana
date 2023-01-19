<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
</script>

<template>
    <div>
        <div class="min-h-screen bg-tertiary">
            <header class="absolute min-w-full h-20 bg-just-white">
                <div
                    class="flex items-center justify-center h-full w-1/6 border-light-gray border-r-2"
                >
                    <Link class="inline-flex" href="/">
                        <img src="../../images/logo.png" alt="Logo Aduana" />
                    </Link>
                </div>
            </header>
            <div class="flex">
                <nav class="bg-primary w-1/6 min-h-screen pt-[135px]"></nav>
                <main class="pt-[135px]">Home</main>
            </div>
        </div>
    </div>
</template>
