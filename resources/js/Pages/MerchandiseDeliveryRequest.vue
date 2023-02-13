<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import MerchandiseDeliveryRequestForm from "@/Components/Forms/MerchandiseDeliveryRequestForm.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";


import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["servicioentmercancias"]);

const search = ref("");

const tableColumns = ref([ //atributos de la tabla SEV de la BD
    { name: "N° SEM", data: "numero_sem" },                      //SEM
    { name: "Fecha Llegada", data: "fecha_llegada" },                //SEM
    { name: "Plazo Maximo", data: "fecha_venc" },                   //SEM

    { name: "Tipo Documento", data: "tipo_doc_p" },                 //Persona
    { name: "N° Documento", data: "nro_id_person" },                //Persona
    { name: "Nombres", data: "nombre_p" },                          //Persona
    { name: "Apellidos", data: "apellido_p" },                      //Persona
    { name: "Nacionalidad", data: "nacionalidad_p" },               //Persona
    { name: "Direccion", data: "direccion_p" },                     //Persona
    { name: "Ciudad", data: "ciudad_p" },                           //Persona

    { name: "Total General", data: "total_general" },              //SEM
    { name: "Numero lig. grav.", data: "numero_lig_grav" },               //SEM
    { name: "Fecha lig. grav.", data: "fecha_gcp" },                          //SEM

    { name: "Peso", data: "peso" },                                 //Mercancias
    { name: "Almacen", data: "nombre_almc" },                       //Mercancias
    { name: "Avanzada", data: "avanzada" },                         //Mercancias

    { name: "Observaciones", data: "observacion" },                 //SEM
    { name: "Estado", data: "estado" },                             //SEM
]);

const show = ref(false);

const onCloseModal = () => show.value = false;

</script>

<template>
    <Head title="Servicio de entrega de Mercancias" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl leading-tight">
                Servicio de entrega de Mercancias
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
                <Table :columns="tableColumns" :items="servicioentmercancias.data" />
            </div>
            <Pagination :links="servicioentmercancias.links" />
        </section>
        <Modal :show="show" :closeable="false">
            <div class="flex justify-between items-center shadow-md p-4">
                <h1 class="text-2xl">Crear Servicio de entrega de Mercancias</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="onCloseModal"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <MerchandiseDeliveryRequestForm @close-modal="show = false"/>
        </Modal>
    </AuthenticatedLayout>
</template>


