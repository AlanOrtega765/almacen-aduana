<script setup>
import { ref, computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";

const user = computed(() => usePage().props.auth.user);
const links = ref([
    {
        title: "Boletas Retención",
        route: "boletas.index",
        icon: "file-lines",
    },
    {
        title: "Contrabandos",
        route: "contrabandos.index",
        icon: "building-shield",
    },
    {
        title: "Abandonos",
        route: "abandonos.index",
        icon: "truck-ramp-box",
    },
    {
        title: "S.E.M",
        route: "mercancias.index",
        icon: "boxes-stacked",
    },
    {
        title: "S.E.V",
        route: "vehiculos.index",
        icon: "car-side",
    },
    {
        title: "Rezagos",
        route: "rezagos.index",
        icon: "people-carry-box",
    },
    {
        title: "Suspensión Despacho",
        route: "suspension.index",
        icon: "dolly",
    },
]);
</script>

<template>
    <div>
        <div class="min-h-screen bg-tertiary">
            <header class="absolute flex min-w-full h-20 bg-just-white">
                <div
                    class="flex items-center justify-center h-full w-1/6 border-light-gray border-r-2"
                >
                    <Link class="inline-flex" :href="route('home')">
                        <img src="../../images/logo.png" alt="Logo Aduana" />
                    </Link>
                </div>
                <div class="flex justify-between items-center px-10 w-5/6">
                    <h1>Sistema de Control de Almacén</h1>
                    <Dropdown>
                        <template #trigger
                            >{{ user.username }}
                            <font-awesome-icon
                                class="w-3 h-3 ml-2"
                                icon="chevron-down"
                            />
                        </template>
                        <template #content>
                            <DropdownLink
                                method="post"
                                :href="route('logout')"
                                as="button"
                                type="button"
                                >Cerrar Sesión</DropdownLink
                            >
                        </template>
                    </Dropdown>
                </div>
            </header>
            <div class="flex">
                <nav class="bg-primary w-1/6 min-h-screen pt-[135px] px-4">
                    <NavLink
                        v-for="(link, index) in links"
                        :key="index"
                        :href="route(link.route)"
                        :active="route().current(link.route)"
                    >
                        <font-awesome-icon class="mr-3" :icon="link.icon" />
                        {{ link.title }}</NavLink
                    >
                </nav>
                <main class="pt-[135px] pb-10 px-10 w-5/6">
                    <slot name="title" />
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
