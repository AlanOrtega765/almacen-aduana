<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import AbandonmentsForm from "@/Components/Forms/AbandonmentsForm.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";

import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["abandonments"]);

const search = ref("");

const tableColumns = ref([ //atributos de la tabla Abandonos que se visualizaran de la BD
    { name: "N° Oficio", data: "n_oficio" },
    { name: "Fecha Oficio", data: "fecha_oficio" },
    { name: "Plazo Maximo", data: "fecha_venc" },
    { name: "Fecha Recepción", data: "fecha_recepcion" },

    { name: "Estado", data: "estado" },

    { name: "Descripcion", data: "nombre_merc" },
    { name: "Turno", data: "turno" },
    { name: "Bultos", data: "cantidad_bulto" },
    { name: "Peso", data: "peso" },
    { name: "Almacen", data: "nombre_almc" },
    { name: "Avanzada", data: "avanzada" },
    { name: "Observación", data: "observacion" },
]);

const show = ref(false);

const onCloseModal = () => show.value = false;
</script>

<template>
    <Head title="Abandono de Mercancias" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl leading-tight">
                Abandono
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
                        placeholder="Buscar n° contrabando..."
                        type="number"
                        v-model="search"
                        @keyup="filterRetentions()"
                    />
                </div>
                <SecondaryButton @click="show = true">
                    <font-awesome-icon class="w-4 h-4 mr-3" icon="plus" />
                    Crear
                </SecondaryButton>
            </div>
            <div class="w-full overflow-auto pb-4 my-10">
                <Table :columns="tableColumns" :items="abandonments.data" />
            </div>
            <Pagination :links="abandonments.links" />
        </section>
        <Modal :show="show" :closeable="false">
            <div class="flex justify-between items-center shadow-md p-4">
                <h1 class="text-2xl">Crear Registro de Abandono</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="onCloseModal"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <AbandonmentsForm @close-modal="show = false"/>
        </Modal>
    </AuthenticatedLayout>
</template>

