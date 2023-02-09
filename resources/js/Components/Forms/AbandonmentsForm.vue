<script setup>
/*Formulario para crear un nuevo registro en la BD */
import InputLabel from "@/Components/InputLabel.vue";
import SelectInput from "@/Components/SelectInput.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { router, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";

defineProps(['form']);
const emits = defineEmits(['update:form', 'closeModal']);

const user = computed(() => usePage().props.auth.user);
const form = ref({
    fecha_oficio: null,             //abandono
    fecha_recepcion: null,          //abandono

    descripcion_mercancias: "",     //mercancias
    bultos: 0,                      //mercancias
    peso: 0,                        //mercancias
    ubicacion: 0,                   //mercancias

    observacion: "",              //abandono

    plazo_maximo: null,             //abandono
    estado: "Vigente",              //abandono

    instituciones: "",              //abandono




});

const message = ref({ //almacena mensaje del formulario
    error: "",
    success: "",
});

const optionsAdvanced = ref([ //opciones de  Ubicacion del Almacen
    { name: "Arica - Bodega Principal", value: 1 },
    { name: "Arica - Bodega Hansen", value: 2 },
    { name: "Arica - Bodega Sitrans", value: 3 },
    { name: "Chacalluta - Bodega Principal", value: 4 },
    { name: "Chungara - Bodega Principal", value: 5 },
    { name: "Visviri - Bodega Principal", value: 6 },
]);

const format = (date) => { //Formato de la fecha
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
};

const merchandise = ref({  //Campos para las mercancias en el formulario
    description: "",
    quantity: 1,
});

const listOfMerchandise = ref([]); //lista de mercancias

const listMerchandise = () => { //metodo que rellena la lista de la mercancia
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

const deleteItem = (index) => { //borrar items del formulario de la lista de mercancias
    listOfMerchandise.value = listOfMerchandise.value.filter((item, id) => {
        if (id !== index) return item;
    });
};

const dateSelected = () => { //creación de plazo fecha de vencimiento
    form.value.plazo_maximo = new Date(form.value.fecha_oficio);
    form.value.plazo_maximo = form.value.plazo_maximo.setDate(
        form.value.plazo_maximo.getDate() + 90
    );
};

const resetForm = () => { //Limpiar el formulario una vez subido a la BD
    listOfMerchandise.value = [];
    merchandise.value = {
        description: "",
        quantity: 1,
    };
    form.value = {
        fecha_oficio: null,             //abandono
        fecha_recepcion: null,          //abandono

        descripcion_mercancias: "",     //mercancias
        bultos: 0,                      //mercancias
        peso: 0,                        //mercancias
        ubicacion: 0,                   //mercancias

        observacion: "",              //abandono

        plazo_maximo: null,             //abandono
        estado: "Vigente",              //abandono

        instituciones: "",              //abandono

    };
};

const submit = () => { //metodo para la creacion de registros
    if (listOfMerchandise.value.length === 0) {
        message.value.error = "¡Debes ingresar mercancías!";
        return;
    }

    const list = [];

    listOfMerchandise.value.forEach((item) => {
        list.push(Object.values(item).reverse().join(" "));
    });
    form.value.descripcion_mercancias = list.join(", ").toUpperCase();

    form.value.fecha_oficio = formatDate(form.value.fecha_oficio);
    form.value.plazo_maximo = formatDate(form.value.plazo_maximo);

    router.post("abandonos/store", form.value, {
        onSuccess: () => {
            resetForm();
            emits('closeModal');
        },
    });
};

const formatDate = (date) => { //formatear fecha
    const _date = new Date(date);
    const day = _date.getDate();
    const month = _date.getMonth() + 1;
    const year = _date.getFullYear();

    return `${year}-${month}-${day}`;
};
</script>

<template>
    <form class="flex flex-col gap-4 p-6" @submit.prevent="submit" >
        <div>
            <h3 class="font-semibold">Fechas Documento Abandono</h3>
            <div class="grid grid-cols-4 gap-2 mt-4">
                <InputLabel class="col-span-1"
                    >Fecha Abandono

                    <DatePicker
                        v-model="form.fecha_oficio"
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
                        :placeholder="user.apellido_p + ' ' + user.apellido_m"
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
                    <SecondaryButton class="h-[38px]" @click="listMerchandise">
                        <font-awesome-icon icon="plus" />
                    </SecondaryButton>
                </div>
                <div class="flex items-center col-span-6">
                    <span
                        :class="
                            merchandise.description.length > 100
                                ? 'text-red'
                                : ''
                        "
                        >{{ merchandise.description.length }} / 100</span
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
                                <th class="text-left pl-4 py-2 w-12">#</th>
                                <th class="text-left w-3/4">Descripción</th>
                                <th class="text-left w-12">Cantidad</th>
                                <th class=""></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="listOfMerchandise.length > 0"
                                v-for="(item, index) in listOfMerchandise"
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
</template>
