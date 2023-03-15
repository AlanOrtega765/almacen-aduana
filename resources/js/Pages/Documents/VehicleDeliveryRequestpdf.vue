<script setup>
/**
 * Vista creada para reproducir el archivo en pdf del documento de SEV
 */
import { Head } from "@inertiajs/vue3";

const props = defineProps(["ServicioentVehiculo"]);

const merchandises = props.retention.nombre_merc.split(",");
</script>

<template>
    <div class="container">
      <div class="row">
        <div class="col">
          Columna 1


        </div>
        <div class="col">
          <h2>Autorizacion</h2>
        </div>
      </div>
    </div>
  </template>
