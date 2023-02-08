<script setup>

import DropdownFilter from "@/Components/DropdownFilter.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import VehicleDeliveryRequestForm2 from "@/Components/Forms/VehicleDeliveryRequestForm2.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["servicioentvehiculos"]);

//const search = ref("");
//atributos de la tabla Retenciones de la BD
const tableColumns = ref([
    { name: "N° SEV", data: "numero_sev" },
    { name: "Fecha Boleta", data: "fecha_llegada" },
    { name: "Plazo Maximo", data: "fecha_venc" },
    { name: "Estado", data: "estado" },

    { name: "Tipo Documento", data: "tipo_doc_p" },
    { name: "N° Documento", data: "nro_id_person" },
    { name: "Nombres", data: "nombre_p" },
    { name: "Apellidos", data: "apellido_p" },
    { name: "Nacionalidad", data: "nacionalidad_p" },
    { name: "Direccion", data: "direccion_p" },
    { name: "Ciudad", data: "ciudad_p" },

    { name: "Marca vehiculo", data: "marca_vehiculo" },
    { name: "Nombre Vehiculo", data: "nom_d_vehiculo" },
    { name: "Placa Patente", data: "ppu" },
    { name: "Tipo Vehiculo", data: "tipo_vehiculo" },
    { name: "Modelo", data: "modelo_vehiculo" },
    { name: "Chasis", data: "chasis_veh" },
    { name: "N Motor", data: "n_motor_vehiculo" },
    { name: "Año", data: "anho_fabric" },
    { name: "Origen", data: "origen_veh" },

    { name: "Almacen", data: "nombre_almc" },
    { name: "Avanzada", data: "avanzada" },

    { name: "Observacion", data: "observacion" },
]);

const show = ref(false);

const onCloseModal = () => show.value = false;

</script>

<template>
    <Head title="Servicio de entrega de Vehiculos" />

    <AuthenticatedLayout>
        <template #title>
            <h2 class="font-semibold text-3xl leading-tight">
                Solicitud de entrega de Vehiculos
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
                <Table :columns="tableColumns" :items="servicioentvehiculos.data" />
            </div>
            <Pagination :links="servicioentvehiculos.links" />
        </section>
        <Modal :show="show" :closeable="false">
            <div class="flex justify-between items-center shadow-md p-4">
                <h1 class="text-2xl">Crear Servicio de entrega de Vehiculos</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="onCloseModal"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <VehicleDeliveryRequestForm2 @close-modal="show = false"/>
        </Modal>
    </AuthenticatedLayout>
</template>


