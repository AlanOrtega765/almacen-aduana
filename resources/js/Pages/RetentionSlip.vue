<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownFilter from "@/Components/DropdownFilter.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SelectInput from "@/Components/SelectInput.vue";
import TextInput from "@/Components/TextInput.vue";
import TextInputFilter from "@/Components/TextInputFilter.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";

import { Head, router, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";

defineProps(["retentions"]);

const user = computed(() => usePage().props.auth.user);

const search = ref("");

const tableColumns = ref([
    { name: "N° Boleta", data: "id" },
    { name: "Fecha Boleta", data: "fecha_boleta" },
    { name: "Plazo Maximo", data: "plazo_maximo" },
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
    { name: "Estado", data: "estado" },
]);

const optionsTypeDocument = ref([
    { name: "CI", value: "CI" },
    { name: "DNI", value: "DNI" },
    { name: "PASAPORTE", value: "Pasaporte" },
]);

const optionsNationality = ref([
    { name: "CHILENA", value: "Chilena" },
    { name: "PERUANA", value: "Peruana" },
    { name: "BOLIVIANA", value: "Boliviana" },
    { name: "OTRA", value: "Otra" },
]);

const optionsFranchise = ref([
    { name: "SI", value: 1 },
    { name: "NO", value: 0 },
]);

const optionsAdvanced = ref([
    { name: "Arica - Bodega Principal", value: 1 },
    { name: "Arica - Bodega Hansen", value: 2 },
    { name: "Arica - Bodega Sitrans", value: 3 },
    { name: "Chacalluta - Bodega Principal", value: 4 },
    { name: "Chungara - Bodega Principal", value: 5 },
    { name: "Visviri - Bodega Principal", value: 6 },
]);

const show = ref(false);

const message = ref({
    error: "",
    success: "",
});

const form = ref({
    fecha_boleta: null,
    tipo_doc_imputado: "",
    n_doc_imputado: "",
    nombres_imputado: "",
    apellidos_imputado: "",
    nacionalidad: "",
    direccion: "",
    ciudad: "",
    franquicia: null,
    descripcion_mercancias: "",
    bultos: 0,
    peso: 0,
    ubicacion: 0,
    observaciones: "",
    plazo_maximo: null,
    estado: "Vigente",
});

const merchandise = ref({
    description: "",
    quantity: 1,
});

const listOfMerchandise = ref([]);

const listMerchandise = () => {
    if (
        merchandise.value.description === "" &&
        merchandise.value.quantity < 1
    ) {
        message.value.error =
            "¡Ingresa una descripción y una cantidad mayor a 0!";
        return;
    }

    if (merchandise.value.description === "") {
        message.value.error = "Ingresa una descripción!";
        return;
    }

    if (merchandise.value.quantity < 1) {
        message.value.error = "¡Ingresa una cantidad mayor a 0!";
        return;
    }

    if (merchandise.value.description.length > 50) {
        message.value.error =
            "¡La descripción debe contener igual o menos de 50 caractéres!";
        return;
    }

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

const onCloseModal = () => {
    show.value = false;
    listOfMerchandise.value = [];
    merchandise.value = {
        description: "",
        quantity: 1,
    };
    form.value = {
        fecha_boleta: null,
        tipo_doc_imputado: "",
        n_doc_imputado: "",
        nombres_imputado: "",
        apellidos_imputado: "",
        nacionalidad: "",
        direccion: "",
        ciudad: "",
        franquicia: null,
        descripcion_mercancias: "",
        bultos: 0,
        peso: 0,
        ubicacion: 0,
        observaciones: "",
        plazo_maximo: null,
        estado: "Vigente",
    };
};

const dateSelected = () => {
    form.value.plazo_maximo = new Date(form.value.fecha_boleta);
    form.value.plazo_maximo = form.value.plazo_maximo.setDate(
        form.value.plazo_maximo.getDate() + 90
    );
};

const submit = () => {
    if (listOfMerchandise.value.length === 0) {
        message.value.error = "¡Debes ingresar mercancías!";
        return;
    }

    const list = [];

    listOfMerchandise.value.forEach((item) => {
        list.push(Object.values(item).reverse().join(" "));
    });
    form.value.descripcion_mercancias = list.join(", ").toUpperCase();

    form.value.fecha_boleta = formatDate(form.value.fecha_boleta);
    form.value.plazo_maximo = formatDate(form.value.plazo_maximo);

    router.post("boletas-retencion/store", form.value);
    console.log(form.value)

    form.value = {
        fecha_boleta: null,
        tipo_doc_imputado: "",
        n_doc_imputado: "",
        nombres_imputado: "",
        apellidos_imputado: "",
        nacionalidad: "",
        direccion: "",
        ciudad: "",
        franquicia: null,
        descripcion_mercancias: "",
        bultos: 0,
        peso: 0,
        ubicacion: 0,
        observaciones: "",
        plazo_maximo: null,
        estado: "Vigente",
    };

    listOfMerchandise.value = [];
};

const formatDate = (date) => {
    const _date = new Date(date);
    const day = _date.getDate();
    const month = _date.getMonth() + 1;
    const year = _date.getFullYear();

    return `${year}-${month}-${day}`;
};
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
            <div class="flex justify-between items-center shadow-md p-4">
                <h1 class="text-2xl">Crear Boleta de Retención</h1>
                <DangerButton
                    class="rounded-full w-9 h-9 flex items-center justify-center"
                    @click="onCloseModal"
                >
                    <font-awesome-icon class="w-4 h-4" icon="xmark" />
                </DangerButton>
            </div>
            <form class="flex flex-col gap-4 p-6" @submit.prevent="submit">
                <div>
                    <h3 class="font-semibold">Fechas Documento</h3>
                    <div class="grid grid-cols-4 gap-2 mt-4">
                        <InputLabel class="col-span-1"
                            >Fecha Retención

                            <DatePicker
                                v-model="form.fecha_boleta"
                                :format="format"
                                required
                                @update:modelValue="dateSelected"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-1"
                            >Plazo Máximo (90 días)

                            <DatePicker
                                readonly
                                required
                                v-model="form.plazo_maximo"
                                :format="format"
                            />
                        </InputLabel>
                    </div>
                </div>
                <div class="w-full h-[1px] bg-gray mt-2"></div>
                <div>
                    <h3 class="font-semibold">Funcionario</h3>

                    <div class="grid grid-cols-4 gap-2 mt-4">
                        <InputLabel class="col-span-2">
                            Nombres
                            <TextInput
                                disabled
                                class="w-full h-[38px] shadow-none border-[1px] px-2 py-3 border-gray"
                                :placeholder="user.nombre_func"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-2">
                            Apellidos
                            <TextInput
                                disabled
                                class="w-full h-[38px] shadow-none border-[1px] px-2 py-3 border-gray"
                                :placeholder="
                                    user.apellido_p + ' ' + user.apellido_m
                                "
                            />
                        </InputLabel>
                    </div>
                </div>
                <div class="w-full h-[1px] bg-gray mt-2"></div>
                <div>
                    <h3 class="font-semibold">Imputado</h3>

                    <div class="grid grid-cols-6 gap-2 mt-4">
                        <InputLabel class="col-span-3">
                            Nombres
                            <TextInput
                                v-model="form.nombres_imputado"
                                required
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-3">
                            Apellidos
                            <TextInput
                                required
                                v-model="form.apellidos_imputado"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-2">
                            Nacionalidad
                            <SelectInput
                                required
                                class="w-full h-[38px]"
                                v-model="form.nacionalidad"
                                :options="optionsNationality"
                            />
                        </InputLabel>

                        <InputLabel class="col-span-2">
                            Tipo Documento
                            <SelectInput
                                required
                                class="w-full h-[38px]"
                                v-model="form.tipo_doc_imputado"
                                :options="optionsTypeDocument"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-2">
                            N° Documento
                            <TextInput
                                required
                                v-model="form.n_doc_imputado"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-2">
                            Dirección
                            <TextInput
                                required
                                v-model="form.direccion"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-2">
                            Ciudad
                            <TextInput
                                required
                                v-model="form.ciudad"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-2">
                            Uso Franquicia
                            <SelectInput
                                class="w-full h-[38px]"
                                required
                                v-model="form.franquicia"
                                :options="optionsFranchise"
                            />
                        </InputLabel>
                    </div>
                </div>
                <div class="w-full h-[1px] bg-gray mt-2"></div>
                <div>
                    <h3 class="col-span-4 font-semibold">Mercancias</h3>
                    <div class="grid grid-cols-6 gap-2 mt-4">
                        <InputLabel class="col-span-4">
                            Descripción
                            <TextInput
                                v-model="merchandise.description"
                                @keydown="message.error = ''"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>

                        <InputLabel class="col-span-1">
                            Cantidad
                            <TextInput
                                v-model="merchandise.quantity"
                                type="number"
                                min="1"
                                @input="message.error = ''"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <div class="col-span-1 self-end">
                            <SecondaryButton
                                class="h-[38px]"
                                @click="listMerchandise"
                            >
                                <font-awesome-icon icon="plus" />
                            </SecondaryButton>
                        </div>
                        <div class="flex items-center col-span-6">
                            <span
                                :class="
                                    merchandise.description.length > 50
                                        ? 'text-red'
                                        : ''
                                "
                                >{{ merchandise.description.length }} / 50</span
                            >
                            <InputError
                                class="col-span-12 ml-4"
                                :message="message.error"
                            />
                        </div>
                        <div
                            class="col-span-6 w-full border-[1px] border-gray rounded-md"
                        >
                            <table class="table-auto w-full">
                                <thead
                                    class="border-b-gray border-t-0 border-x-0 border-[1px]"
                                >
                                    <tr>
                                        <th class="text-left pl-4 py-2 w-12">
                                            #
                                        </th>
                                        <th class="text-left w-3/4">
                                            Descripción
                                        </th>
                                        <th class="text-left w-12">Cantidad</th>
                                        <th class=""></th>
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
                                        <td class="text-center">
                                            {{ item.quantity }}
                                        </td>
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

                        <InputLabel class="col-span-1">
                            Peso (Kg)
                            <TextInput
                                v-model="form.peso"
                                type="number"
                                required
                                min="0"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-1">
                            Bultos
                            <TextInput
                                v-model="form.bultos"
                                type="number"
                                required
                                min="0"
                                class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                            />
                        </InputLabel>
                        <InputLabel class="col-span-4">
                            Ubicación
                            <SelectInput
                                class="w-full h-[38px]"
                                v-model="form.ubicacion"
                                required
                                :options="optionsAdvanced"
                            />
                        </InputLabel>
                    </div>
                </div>
                <div class="w-full h-[1px] bg-gray mt-2"></div>
                <div>
                    <h3 class="font-semibold">Observaciones</h3>
                    <textarea
                        class="w-full focus:ring-0 focus:border-dark-gray border-gray border-[1px] rounded-md"
                        rows="4"
                        v-model="form.observaciones"
                    ></textarea>
                </div>

                <PrimaryButton class="mt-2"> Registrar </PrimaryButton>
            </form>
        </Modal>
    </AuthenticatedLayout>
</template>
