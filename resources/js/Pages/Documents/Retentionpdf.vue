<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

</script>

<template>

<header class="text-center" >COMPROBANTE DE RETENCIÓN</header>

        <h1 class="text-right">FECHA:</h1>
        <h1 class="text-right">AVANZADA:</h1>
        <h1 class="text-right">UBICACIÓN:</h1>

        <div>
            <h1 class="text-left">PASAJERO:</h1>
            <h1 class="text-left">RUT/DNI/PASAPORTE</h1>
            <h1 class="text-left">NACIONALIDAD</h1>
            <h1 class="text-left">DOMICILIO:</h1>
            <h1 class="text-left">CIUDAD:</h1>
        </div>

        <div>

            <table class="text-center">
                <thead>
                    <tr>
                        <th>CANTIDAD</th>
                        <th>DESCRIPCION</th>

                    </tr>
                    <tr>
                        <th> 10000</th>
                        <th>PRECIADORES PUBLICITARIOS</th>
                    </tr>
                    <tr>
                        <th> 500</th>
                        <th>BANNER DE 1,2X0,60</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div>

            <footer>
                <h2>Observaciones:</h2>
                <p>NOTA: Si la mercancia no es legalmente desaduanada(retirada) dentro de 90 dias, se presume abandono a beneficio fiscal.
                    Las Mercancias quedarán gravas con las tarifas de almacenaje, a contar del sexto dia en adelante</p>
                <p>(Dto 1109/96)</p>
                <p>Plazo Maximo de Retiro: 21-01-2023</p>
            </footer>
        </div>

</template>
