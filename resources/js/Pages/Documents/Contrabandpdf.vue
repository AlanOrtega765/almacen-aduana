<script setup>
import { Head } from "@inertiajs/vue3";

const props = defineProps(["contraband"]);

const merchandises = props.retention.nombre_merc.split(",");
</script>

<template>
    <Head title="Rol de Contrabando" />
    <div class="pt-20">
        <header class="flex items-center justify-center gap-10 text-center">
            <div class="relative flex">
                <div class="absolute flex -left-44 -top-4">
                    <img
                        class="h-20"
                        src="../../../images/logo_gobierno_chile.png"
                    />
                    <img
                        class="h-20 ml-4"
                        src="../../../images/logo_aduana.jpg"
                    />
                </div>
                <h1 class="text-2xl font-bold">ROL DE CONTRABANDO</h1>
            </div>
        </header>

        <main>
            <div>
                <h1 class="text-right text-4xl font-bold mt-10">
                    N° {{ contraband.n_rol }}
                </h1>
                <div class="flex flex-col w-full items-end uppercase">
                    <span>FECHA C.R.: {{ contraband.fecha_reten }}</span>
                    <span>AVANZADA: {{ contraband.avanzada }}</span>
                    <span>ALMACÉN: BODEGA {{ contraband.nombre_almc }}</span>
                </div>
                <div class="flex flex-col uppercase">
                    <span
                        >PASAJERO:
                        {{
                            contraband.nombre_p + " " + contraband.apellido_p
                        }}</span
                    >
                    <span
                        >RUT / DNI / PASAPORTE:
                        {{ contraband.nro_id_person }}</span
                    >
                    <span>NACIONALIDAD: {{ contraband.nacionalidad_p }}</span>
                    <span>DOMICILIO: {{ contraband.direccion_p }}</span>
                    <span>CIUDAD: {{ contraband.ciudad_p }}</span>
                </div>
                <table class="table-auto w-full mt-5">
                    <thead>
                        <tr
                            class="text-center border-b-[1px] border-soft-black"
                        >
                            <th>DESCRIPCIÓN MERCANCÍAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in merchandises" :key="index">
                            <td>{{ item }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div :class="merchandises.length >= 10 ? 'relative' : 'absolute'" class="bottom-0 w-full mt-20">
                <div class="flex justify-between mb-10">
                    <div
                        class="flex flex-col border-t-[1px] border-soft-black w-[200px]"
                    >
                        <span class="text-center">Firma Pasajero</span>
                    </div>
                    <div
                        class="flex flex-col border-t-[1px] border-soft-black w-[200px]"
                    >
                        <span class="text-center">Firma Funcionario</span>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex justify-between mb-5">
                        <h5 class="font-bold">
                            Uso de Franquicia:
                            <span class="font-normal" v-html="contraband.franquicia === 1 ? 'SI' : 'NO'"></span>
                        </h5>
                        <h5 class="font-bold">
                            Peso: <span class="font-normal">{{ contraband.peso }} Kg.</span>
                        </h5>
                        <h5 class="font-bold">
                            Bultos: <span class="font-normal">{{ contraband.cantidad_bulto }}</span>
                        </h5>
                    </div>
                    <div class="w-full">
                        <h4 class="font-bold mb-3">OBSERVACIONES:</h4>
                        <div
                            class="border-[1px] border-soft-black border-opacity-20 w-full h-32"
                        >{{ contraband.observaciones }}</div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold"
                            >NOTA: Si la mercancia no es legalmente desaduanada
                            (retirada) dentro de 90 días, se presume abandono a
                            beneficio fiscal.</span
                        >
                        <span class="font-bold"
                            >Las mercancias quedarán gravadas con las tarifas de
                            almacenaje, a contar del sexto día en adelante (Dto.
                            1109/96)</span
                        >
                        <span class="font-bold"
                            >Plazo Máximo de Retiro: {{ contraband.fecha_venc }}</span
                        >
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
