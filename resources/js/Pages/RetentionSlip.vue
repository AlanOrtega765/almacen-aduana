<script setup>
/**
 * Vista creada para mostrar todos los atributos relacionados a los Comprobantes de Retención
 */
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import RetentionSlipForm from "@/Components/Forms/RetentionSlipForm.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";

import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["retentions"]);

const search = ref("");

const tableColumns = ref([ //atributos de la tabla Retenciones de la BD
    { name: "N° Boleta", data: "n_boleta" },                //Retenciones
    { name: "Fecha Boleta", data: "fecha_reten" },          //Retenciones
    { name: "Plazo Maximo", data: "fecha_venc" },           //Retenciones
    { name: "Tipo Documento", data: "tipo_doc_p" },         //Personas
    { name: "N° Documento", data: "nro_id_person" },        //Personas
    { name: "Nombres", data: "nombre_p" },                  //Personas
    { name: "Apellidos", data: "apellido_p" },              //Personas
    { name: "Nacionalidad", data: "nacionalidad_p" },       //Personas
    { name: "Direccion", data: "direccion_p" },             //Personas
    { name: "Ciudad", data: "ciudad_p" },                   //Personas
    { name: "Uso Franquicia", data: "franquicia" },         //Retenciones
    { name: "Descripcion", data: "nombre_merc" },           //Mercancias
    { name: "Bultos", data: "cantidad_bulto" },             //Mercancias
    { name: "Peso", data: "peso" },                         //Mercancias
    { name: "Almacen", data: "nombre_almc" },               //Almacen
    { name: "Avanzada", data: "avanzada" },                 //Almacen
    { name: "Observaciones", data: "observaciones" },       //Retenciones
    { name: "Estado", data: "estado" },                     //Retenciones
]);

const show = ref(false);

const onCloseModal = () => show.value = false;
</script>

<template>
    <Head title="Boletas de Retención" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl leading-tight">
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
                <Table :columns="tableColumns" :items="retentions.data" />
            </div>
            <Pagination :links="retentions.links" />
        </section>
        <Modal :show="show" :closeable="false">
            <div class="flex justify-between items-center shadow-md p-4">
                <h1 class="text-2xl">Crear Boleta de Retención</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="onCloseModal"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <RetentionSlipForm @close-modal="show = false"/>
        </Modal>
    </AuthenticatedLayout>
</template>
