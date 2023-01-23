<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Table from "@/Components/Table.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps(["retentions", "links"]);

const tableColumns = [
    { name: "N° Boleta", data: "id" },
    { name: "Fecha Boleta", data: "fecha_boleta" },
    { name: "N° Documento", data: "n_doc_imputado" },
    { name: "Nombres", data: "nombres_imputado" },
    { name: "Apellidos", data: "apellidos_imputado" },
    { name: "Nacionalidad", data: "nacionalidad" },
    { name: "Direccion", data: "direccion" },
    { name: "Ciudad", data: "ciudad" },
    { name: "Uso Franquicia", data: "franquicia" },
    { name: "Descripcion", data: "descripcion" },
    { name: "Peso", data: "peso" },
    { name: "Avanzada", data: "avanzada" },
    { name: "Almacén", data: "almacen" },
    { name: "Observaciones", data: "observaciones" },
    { name: "Plazo Maximo", data: "plazo_maximo" },
    { name: "Estado", data: "estado" },
];
console.log(props.retentions.links);
</script>

<template>
    <Head title="Boletas de Retención" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                Boletas Retención
            </h2>
        </template>

        <section class="mt-10">
            <div class="flex justify-between">
                <div class="flex shadow-md rounded-md">
                    <DropdownFilter class="mr-[1px]" align="left">
                        <template #trigger>
                            <h1>Filtros</h1>
                            <font-awesome-icon
                                class="w-3 h-3 ml-2"
                                icon="filter"
                            />
                        </template>
                        <template #content></template>
                    </DropdownFilter>
                    <TextInputFilter
                        placeholder="Buscar n° boleta..."
                        type="number"
                    />
                </div>
                <SecondaryButton>
                    <font-awesome-icon class="w-4 h-4 mr-3" icon="plus" />
                    Crear
                </SecondaryButton>
            </div>
            <div class="w-full overflow-auto pb-4 my-10">
                <Table
                    :width="'w-[250%]'"
                    :columns="tableColumns"
                    :items="retentions.data"
                />
            </div>
            <div class="flex">
                <div v-for="link in retentions.links">
                    <div v-if="link.url === null" v-html="link.label" />
                    <Link
                        v-else
                        class="flex"
                        :href="link.url"
                        v-html="link.label"
                    />
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
