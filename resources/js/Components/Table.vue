<script setup>
import { Link } from '@inertiajs/vue3';
defineProps(["columns", "items", 'width']);
</script>

<template>
    <table class="table-auto text-left bg-just-white rounded-xl min-w-max">
        <thead class="h-10 border-b-[1px] border-light-gray">
            <tr>
                <th class="text-center pl-5"> Imprimir </th>
                <th class="pl-5 last-of-type:pr-5" v-for="(column, index) in columns" :key="index">
                    {{ column.name }}
                </th>
                <th v-if="false">Acciones</th>
            </tr>
        </thead>
        <tbody class="relative">
            <tr
                v-if="items.length > 0"
                class="h-10 border-b-[1px] last-of-type:border-0 border-light-gray"
                v-for="(item, index) in items"
                :key="index"
            >
                <td class="text-center pl-5">
                    <Link :href="`/boletas-retencion/pdf/${item.n_boleta}`"> <font-awesome-icon class="w-5 h-5" icon="file-pdf"/> </Link>
                </td>
                <td
                    class="pl-5"
                    v-for="(column, indexColumn) in columns"
                    :key="indexColumn"
                >
                    {{ item[column.data] }}
                </td>
            </tr>
            <tr class="bg-just-white h-10 block rounded-b-xl" v-else>
                <span class="absolute flex justify-center items-center w-full h-full text-dark-gray uppercase">No se encontraron registros</span>
            </tr>
        </tbody>
    </table>
</template>
