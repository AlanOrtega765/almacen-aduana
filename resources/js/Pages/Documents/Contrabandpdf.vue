<script setup>
import { Head } from "@inertiajs/vue3";

const props = defineProps(["retention"]);

const merchandises = props.retention.nombre_merc.split(",");
</script>

<template>
    <Head title="Rol de contrabando" />
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
                    ROL ALMACEN N° {{1963 contrabandos.n_rol}}
                </h2>
                <h2 class="text-right text-4xl font-bold mt-10">
                    Arica , {{contrabandos.fecha_contrab}}
                </h2>
                <div class="flex flex-col w-full items-end uppercase">
                   <h4>En {{Arica}}, a {{contrabandos.fecha_contrab}}, mediante {{contrabandos.doc_denunciante + contrabandos.fecha_canc}}, donde se hace mención de procedimiento adoptado y descrito por parte policial {N°5900} de fecha {29.12.2022} de la {1ra COMISARIA CARABINEROS ARICA} se hace la recepcion de las mercancias que se detallan mas adelante, incautadas por conceptos de Contrabando, vulnerando así el Art 168 de la Ordenanza de Aduanas.</h4>
                   <h4>Se procede a abrir el presente Rol de Almacén de la mercancia que mas abajo detalla.</h4>
                </div>
                <div class="flex flex-col uppercase">

                    <h2 class="text-center">IDENTIFICACIÓN DEL IMPUTADO</h2>

                    <table>
                        <thead>
                            <tr>NOMBRE</tr>
                            <tr>IDENTIFICACIÓN/DNI</tr>
                            <tr>NACIONALIDAD</tr>
                            <tr>DIRECCIÓN</tr>
                        </thead>
                        <tbody>
                            <td>{{ personas.nombre_p + personas.apellido_p}}</td>
                            <td>{{ personas.tipo_doc_p}}</td>
                            <td>{{ personas.nacionalidad_p}}</td>
                            <td>{{ personas.direccion_p}}</td>
                        </tbody>
                    </table>

                </div>
                <table class="table-auto w-full mt-5">
                    <thead>
                        <tr
                            class="text-center border-b-[1px] border-soft-black"
                        >
                            <th>DESCRIPCIÓN DE MERCANCÍAS INCAUTADAS</th>
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
                        >Ubicación de las mercancias{{ almacenes.nombre_almc}}</div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold"
                            >SE ADJUNTA</span
                        >
                        <span class="font-bold"> OFICIO{{ contrabandos.doc_denunciante }}</span
                        >
                        <span class="font-bold">PARTE POLICIAL: N°{5900/29.12.2022}</span>
                        <span class="font-bold">ACTA DE INCAUTANCIÓN DE ESPECIES</span>
                        <span class="font-bold">SET FOTOGRAFICO</span>
                        <span class="font-bold">NUE. {{ contrabandos.nue }}</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
