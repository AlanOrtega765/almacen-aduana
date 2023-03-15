<script setup>
import { Head } from "@inertiajs/vue3";

const props = defineProps(["abandonment"]);

const merchandises = props.abandonment.nombre_merc.split(",");
</script>

<template>
    <Head title="Abandono" />
    <div class="pt-20">
        <header class="flex items-center justify-center gap-10 text-center">
            <div class="relative flex">
                <div class="absolute flex -left-44 -top-4">

                    <img
                        class="h-20 ml-4"
                        src="../../../images/logo_aduana.jpg"
                    />
                </div>
            </div>
        </header>

        <main>
            <div>
                <h2 class="text-right text-4xl font-bold mt-10">
                    OF. ORD. {{ abandonos.n_oficio }}
                </h2>
                <div class="flex flex-col w-full items-end uppercase">
                    <span>MAT: Remite movimiento de mercancias </span>
                    <span>REF: Art. 136°, y siguientes de la Ordenanza de Aduanas</span>
                    <span>ALMACÉN: BODEGA {{ retention.nombre_almc }}</span>
                    <div ></div>
                    <div class="w-full h-[1px] bg-gray mt-2">
                        <span>{{ almacenes.nombre_almc }}, {{ abandonos.fecha_oficio }}</span>
                    </div>
                </div>
                <div class="flex flex-col uppercase">
                    <span> DE: JEFE DE TURNO {{ almacenes.avanzada }} </span>
                    <span> A: JEFE UNIDAD ALMACÉN DEPOSITOS Y REZAGOS DIRECCIÓN REGIONAL ADUANA DE ARICA </span>

                </div>
                <div class="w-full h-[1px] bg-gray mt-2"></div>
                <div>
                    <h4> Me permito informar a Ud., que con {{abandonos.fecha_oficio }}, mercancías en calidad de abandonadas en Zona Primaria de esta Avanzada</h4>
                </div>
                <table class="table-auto w-full mt-5">
                    <thead>
                        <tr> TURNO {00:00 A 8:00 HRS}</tr>
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
                <div class="flex flex-col">
                    <div class="flex justify-between mb-5">
                        <h5 class="font-bold">
                            Uso de Franquicia:
                            <span class="font-normal" v-html="retention.franquicia === 1 ? 'SI' : 'NO'"></span>
                        </h5>
                        <h5 class="font-bold">
                            Peso: <span class="font-normal">{{ retention.peso }} Kg.</span>
                        </h5>
                        <h5 class="font-bold">
                            Bultos: <span class="font-normal">{{ retention.cantidad_bulto }}</span>
                        </h5>
                    </div>
                    <div class="w-full">
                        <h4 class="font-bold mb-3">OBSERVACIONES:</h4>
                        <div
                            class="border-[1px] border-soft-black border-opacity-20 w-full h-32"
                        >{{ retention.observaciones }}</div>
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
                            >Plazo Máximo de Retiro: {{ retention.fecha_venc }}</span
                        >
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
