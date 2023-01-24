<script setup>
defineProps(["columns", "items", 'width']);
</script>

<template>
    <table class="table-auto text-left bg-just-white rounded-xl" :class="width">
        <thead class="h-16 border-b-[1px] border-light-gray">
            <tr>
                <th class="pl-5 last-of-type:pr-5" v-for="(column, index) in columns" :key="index">
                    {{ column.name }}
                </th>
                <th v-if="false">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="h-16 border-b-[1px] last-of-type:border-0 border-light-gray"
                v-for="(item, index) in items"
                :key="index"
            >
                <td
                    class="pl-5"
                    v-for="(column, indexColumn) in columns"
                    :key="indexColumn"
                >
                    {{ item[column.data] }}
                </td>
            </tr>
        </tbody>
    </table>
</template>
