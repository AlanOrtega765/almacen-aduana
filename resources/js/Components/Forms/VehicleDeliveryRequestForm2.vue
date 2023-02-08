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
    fecha_llegada: null,            //SEV

    tipo_doc_persona: "",           //Persona
    n_doc_persona: "",              //Persona
    nombres_persona: "",            //Persona
    apellidos_persona: "",          //Persona
    nacionalidad: "",               //Persona
    direccion: "",                  //Persona
    ciudad: "",                     //Persona


    marca_vehiculo: "",             //Datos Vehiculo
    nom_d_vehiculo: "",             //Datos Vehiculo
    ppu: "",                        //Datos Vehiculo
    tipo_vehiculo: "",              //Datos Vehiculo
    modelo_vehiculo: "",            //Datos Vehiculo
    chasis_veh: "",                 //Datos Vehiculo
    n_motor_vehiculo: "",           //Datos Vehiculo
    anho_fabric: 0,                //Datos Vehiculo
    origen_veh: "",                 //Datos Vehiculo

    ubicacion: 0,                   //Almacen
    observaciones: "",              //SEV
    plazo_maximo: null,             //SEV
    estado: "Vigente",              //SEV
});

const message = ref({
    error: "",
    success: "",
});

const optionsTypeDocument = ref([
    { name: "CI", value: "CI" },
    { name: "DNI", value: "DNI" },
    { name: "PASAPORTE", value: "Pasaporte" },
]);

const optionsTypeVehicule = ref([
    { name: "AUTO", value: "AUTO" },
    { name: "CAMIONETA", value: "CAMIONETA" },
    { name: "STATION WAGON", value: "STATION WAGON" },
    { name: "OTRO", value: "OTRO" },
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

const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
};

const vehicule = ref({
    description: "",
    quantity: 1,
});

const listOfVehicule = ref([]);

const listVehicule = () => {
    if (
        vehicule.value.description === "" &&
        vehicule.value.quantity < 1
    ) {
        message.value.error =
            "¡Ingresa una descripción y una cantidad mayor a 0!";
        return;
    }

    if (vehicule.value.description === "") {
        message.value.error = "Ingresa una descripción!";
        return;
    }

    if (vehicule.value.quantity < 1) {
        message.value.error = "¡Ingresa una cantidad mayor a 0!";
        return;
    }

    if (vehicule.value.description.length > 50) {
        message.value.error =
            "¡La descripción debe contener igual o menos de 50 caractéres!";
        return;
    }

    listOfVehicule.value.push({
        description: vehicule.value.description,
        quantity: vehicule.value.quantity,
    });

    vehicule.value = {
        description: "",
        quantity: 1,
    };
};

const deleteItem = (index) => {
    listOfVehicule.value = listOfVehicule.value.filter((item, id) => {
        if (id !== index) return item;
    });
};

const dateSelected = () => {
    form.value.plazo_maximo = new Date(form.value.fecha_llegada);
    form.value.plazo_maximo = form.value.plazo_maximo.setDate(
        form.value.plazo_maximo.getDate() + 90
    );
};

const resetForm = () => {
    listOfVehicule.value = [];
    vehicule.value = {
        description: "",
        quantity: 1,
    };
    form.value = {
        fecha_llegada: null,            //SEV

        tipo_doc_persona: "",           //Persona
        n_doc_persona: "",              //Persona
        nombres_persona: "",            //Persona
        apellidos_persona: "",          //Persona
        nacionalidad: "",               //Persona
        direccion: "",                  //Persona
        ciudad: "",                     //Persona


        marca_vehiculo: "",             //Datos Vehiculo
        nom_d_vehiculo: "",             //Datos Vehiculo
        ppu: "",                        //Datos Vehiculo
        tipo_vehiculo: "",              //Datos Vehiculo
        modelo_vehiculo: "",            //Datos Vehiculo
        chasis_veh: "",                 //Datos Vehiculo
        n_motor_vehiculo: "",           //Datos Vehiculo
        anho_fabric: "",                //Datos Vehiculo
        origen_veh: "",                 //Datos Vehiculo

        ubicacion: 0,                   //Almacen
        observaciones: "",              //SEV
        plazo_maximo: null,             //SEV
        estado: "Vigente",              //SEV
    };
};

const submit = () => {
    if (listOfVehicule.value.length === 0) {
        message.value.error = "¡Debes ingresar Vehiculos!";
        return;
    }

    const list = [];

    listOfVehicule.value.forEach((item) => {
        list.push(Object.values(item).reverse().join(" "));
    });
    form.value.descripcion_mercancias = list.join(", ").toUpperCase();

    form.value.fecha_boleta = formatDate(form.value.fecha_llegada);
    form.value.plazo_maximo = formatDate(form.value.plazo_maximo);

    router.post("boletas-retencion/store", form.value, {
        onSuccess: () => {
            resetForm();
            emits('closeModal');
        },
    });
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
    <form class="flex flex-col gap-4 p-6" @submit.prevent="submit" >
        <div>
            <h3 class="font-semibold">Fechas SEV</h3>
            <div class="grid grid-cols-4 gap-2 mt-4">
                <InputLabel class="col-span-1"
                    >Fecha SEV

                    <DatePicker
                        v-model="form.fecha_llegada"
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
            <h3 class="font-semibold">Consignatario</h3>

            <div class="grid grid-cols-6 gap-2 mt-4">
                <InputLabel class="col-span-3">
                    Nombres Consignatario
                    <TextInput
                        v-model="form.nombres_persona"
                        required
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-3">
                    Apellidos Consignatario
                    <TextInput
                        required
                        v-model="form.apellidos_persona"
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
                        v-model="form.tipo_doc_persona"
                        :options="optionsTypeDocument"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    N° Documento
                    <TextInput
                        required
                        v-model="form.n_doc_persona"
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
            </div>
        </div>
        <div class="w-full h-[1px] bg-gray mt-2"></div>
        <div>
            <h3 class="font-semibold">Datos Vehiculo</h3>

            <div class="grid grid-cols-6 gap-2 mt-4">
                <InputLabel class="col-span-2">
                    Marca de Vehiculo
                    <TextInput
                        v-model="form.marca_vehiculo"
                        required
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Nombre de Vehiculo
                    <TextInput
                        required
                        v-model="form.nom_d_vehiculo"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Placa Patente Unica
                    <TextInput
                        required
                        v-model="form.ppu"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>

                <InputLabel class="col-span-2">
                    Tipo de Vehiculo
                    <SelectInput
                        required
                        class="w-full h-[38px]"
                        v-model="form.tipo_vehiculo"
                        :options="optionsTypeVehicule"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Modelo del Vehiculo
                    <TextInput
                        required
                        v-model="form.modelo_vehiculo"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Chasis del Vehiculo
                    <TextInput
                        required
                        v-model="form.chasis_veh"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Numero Motor Vehiculo
                    <TextInput
                        required
                        v-model="form.n_motor_vehiculo"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Año de Fabricación
                    <TextInput
                        required
                        v-model="form.anho_fabric"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
                    />
                </InputLabel>
                <InputLabel class="col-span-2">
                    Origen del Vehiculo
                    <TextInput
                        required
                        v-model="form.origen_veh"
                        class="w-full h-[38px] border-[1px] shadow-none rounded outline-none hover:border-dark-gray transition-colors duration-200 focus:border-dark-gray px-2 py-3 border-gray"
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
