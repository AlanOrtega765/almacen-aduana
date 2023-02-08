<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import ContrabandForm from "@/Components/Forms/ContrabandForm.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";

import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["contrabands"]);

const search = ref("");

const tableColumns = ref([
{ name: "N° Rol", data: "n_rol" },
    { name: "Fecha Contrabando", data: "fecha_contrab" },
    { name: "Plazo Maximo", data: "fecha_venc_contrab" },
    { name: "Tipo contrabando", data: "tipo_contrabando" },
    { name: "Instituciones", data: "instituciones" },
    { name: "Tipo Documento", data: "tipo_doc_p" },
    { name: "N° Documento", data: "nro_id_person" },
    { name: "Nombres", data: "nombre_p" },
    { name: "Apellidos", data: "apellido_p" },
    { name: "Nacionalidad", data: "nacionalidad_p" },
    { name: "Direccion", data: "direccion_p" },
    { name: "Ciudad", data: "ciudad_p" },

    { name: "N.U.E", data: "nue" },
    { name: "Documento denunciante", data: "doc_denunciante" },
    { name: "Documento cancelacion", data: "doc_cancelacion" },
    { name: "Fecha cancelacion", data: "fecha_canc" },
    { name: "Documento de entrega", data: "doc_de_entrega" },
    { name: "Fecha documento entrega", data: "fecha_doc_entrega" },
    { name: "Observaciones", data: "observaciones" },

    { name: "Almacen", data: "nombre_almc" },
    { name: "Avanzada", data: "avanzada" },
    { name: "Observaciones", data: "observaciones" },
    { name: "Estado", data: "estado" },
]);

const show = ref(false);

const onCloseModal = () => show.value = false;
</script>

<template>
    <Head title="Contrabandos" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl leading-tight">
                Contrabandos
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
                <Table :columns="tableColumns" :items="contrabands.data" />
            </div>
            <Pagination :links="contrabands.links" />
        </section>
        <Modal :show="show" :closeable="false">
            <div class="flex justify-between items-center shadow-md p-4">
                <h1 class="text-2xl">Crear Documento de Contrabando</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="onCloseModal"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <ContrabandForm @close-modal="show = false"/>
        </Modal>
    </AuthenticatedLayout>
</template>
