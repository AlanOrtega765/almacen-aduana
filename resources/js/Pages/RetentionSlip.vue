<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SelectInput from "@/Components/SelectInput.vue";
import TextInput from "@/Components/TextInput.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";

import { Head } from "@inertiajs/vue3";
import { ref, reactive } from "vue";

defineProps(["retentions"]);
const search = ref("");

const tableColumns = [
    { name: "N° Boleta", data: "id" },
    { name: "Fecha Boleta", data: "fecha_boleta" },
    { name: "Tipo Documento", data: "tipo_doc_imputado" },
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

const show = ref(false);

const form = reactive({
    fecha_boleta: null,
    tipo_doc_imputado: "",
    n_doc_imputado: "",
    nombres_imputado: "",
    apellidos_imputado: "",
    nacionalidad: "",
    direccion: "",
    ciudad: "",
    franquicia: "",
    descripcion: "",
    bultos: 0,
    peso: "",
    avanzada: "",
    almacen: "",
    obervaciones: "",
    plazo_maximo: null,
    estado: "",
});

const merchandise = ref({
    description: "",
    quantity: 1,
});

const listOfMerchandise = ref([]);

const listMerchandise = () => {
    listOfMerchandise.value.push({
        description: merchandise.value.description,
        quantity: merchandise.value.quantity,
    });

    merchandise.value = {
        description: "",
        quantity: 1,
    };
};

const deleteItem = (index) => {
    listOfMerchandise.value = listOfMerchandise.value.filter((item, id) => {
        if (id !== index) return item;
    });
};

const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
};

const optionsTypeDocument = [
    { name: "", value: "", selected: true },
    { name: "CI", value: "CI", selected: false },
    { name: "DNI", value: "DNI", selected: false },
    { name: "PASAPORTE", value: "PASAPORTE", selected: false },
];

const optionsNationality = [
    { name: "", value: "", selected: true },
    { name: "CHILENA", value: "CHILENA", selected: false },
    { name: "PERUANA", value: "PERUANA", selected: false },
    { name: "BOLIVIANA", value: "BOLIVIANA", selected: false },
    { name: "OTROS", value: "OTROS", selected: false },
];

const optionsFranchise = [
    { name: "", value: "", selected: true },
    { name: "SI", value: "SI", selected: false },
    { name: "NO", value: "NO", selected: false },
];

const optionsAdvanced = [
    { name: '', value: '', selected: true },
    { name: 'CHUNGARA', value: 'CHUNGARA', selected: false },
    { name: 'CHACALLUTA', value: 'CHACALLUTA', selected: false },
    { name: 'VISVIRI', value: 'VISVIRI', selected: false },
    { name: 'HANS', value: 'HANS', selected: false },
    { name: 'SITRANS', value: 'SITRANS', selected: false },
]
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
                    />
                </div>
                <SecondaryButton @click="show = true">
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
            <Pagination :links="retentions.links" />
        </section>
        <Modal :show="show" :closeable="false">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl">Crear Boleta de Retención</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="show = false"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <form class="flex flex-col gap-4 mt-4" @submit.prevent="submit">
                <div class="grid grid-cols-4">
                    <InputLabel class="col-span-1"
                        >Fecha Boleta

                        <DatePicker
                            v-model="form.fecha_boleta"
                            :format="format"
                        />
                    </InputLabel>
                </div>
                <div>
                    <h3 class="col-span-4 font-semibold">Datos Imputado</h3>

                    <div class="grid grid-cols-6 gap-2">
                        <div class="col-span-2">
                            <InputLabel>
                                Nombres
                                <TextInput
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-2">
                            <InputLabel>
                                Apellidos
                                <TextInput
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-2">
                            <InputLabel>
                                Nacionalidad
                                <SelectInput
                                    class="w-full h-[38px]"
                                    v-model="form.tipo_doc_imputado"
                                    :options="optionsNationality"
                                />
                            </InputLabel>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-2">
                        <div class="col-span-2">
                            <InputLabel>
                                Tipo Documento
                                <SelectInput
                                    class="w-full h-[38px]"
                                    v-model="form.tipo_doc_imputado"
                                    :options="optionsTypeDocument"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-2">
                            <InputLabel>
                                N° Documento
                                <TextInput
                                    v-model="form.n_doc_imputado"
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-2">
                            <InputLabel>
                                Dirección
                                <TextInput
                                    v-model="form.direccion"
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-2">
                        <div class="col-span-2">
                            <InputLabel>
                                Ciudad
                                <TextInput
                                    v-model="form.ciudad"
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-2">
                            <InputLabel>
                                Uso Franquicia
                                <SelectInput
                                    class="w-full h-[38px]"
                                    v-model="form.tipo_doc_imputado"
                                    :options="optionsFranchise"
                                />
                            </InputLabel>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="col-span-4 font-semibold">Mercancias</h3>
                    <div class="grid grid-cols-6 gap-2">
                        <div class="col-span-4">
                            <InputLabel>
                                Descripción
                                <TextInput
                                    v-model="merchandise.description"
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-1">
                            <InputLabel>
                                Cantidad
                                <TextInput
                                    v-model="merchandise.quantity"
                                    type="number"
                                    min="0"
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-1 self-end h-[38px]">
                            <SecondaryButton
                                class="h-full"
                                @click="listMerchandise"
                            >
                                <font-awesome-icon icon="plus" />
                            </SecondaryButton>
                        </div>
                        <div
                            class="col-span-6 w-full border-[1px] border-gray rounded-md"
                        >
                            <table class="table-auto w-full">
                                <thead
                                    class="border-b-gray border-t-0 border-x-0 border-[1px]"
                                >
                                    <tr>
                                        <th class="text-left pl-4 py-2">#</th>
                                        <th class="text-left">Descripción</th>
                                        <th class="text-left">Cantidad</th>
                                        <th class="text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="listOfMerchandise.length > 0"
                                        v-for="(
                                            item, index
                                        ) in listOfMerchandise"
                                        :key="index"
                                        @click="deleteItem(index)"
                                        class="border-b-gray group border-x-0 hover:bg-soft-black hover:bg-opacity-5 hover:cursor-pointer border-t-0 last-of-type:border-b-0 border-[1px]"
                                    >
                                        <td class="pl-4 py-2">
                                            {{ index + 1 }}
                                        </td>
                                        <td>{{ item.description }}</td>
                                        <td>{{ item.quantity }}</td>
                                        <td>
                                            <font-awesome-icon
                                                class="invisible group-hover:visible text-dark-gray"
                                                icon="xmark"
                                            />
                                        </td>
                                    </tr>
                                    <tr v-else class="relative h-10">
                                        <span
                                            class="absolute w-full flex items-center justify-center h-full uppercase text-dark-gray"
                                            >No hay mercancías añadidas</span
                                        >
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-2">
                        <div class="col-span-2">
                            <InputLabel>
                                Peso
                                <TextInput
                                    v-model="form.peso"
                                    type="number"
                                    min="0"
                                    class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                                />
                            </InputLabel>
                        </div>
                        <div class="col-span-2">
                            <InputLabel>
                                Avanzada
                                <SelectInput
                                    class="w-full h-[38px]"
                                    v-model="form.avanzada"
                                    :options="optionsAdvanced"
                                />
                            </InputLabel>
                        </div>
                    </div>
                </div>
            </form>
        </Modal>
    </AuthenticatedLayout>
</template>
