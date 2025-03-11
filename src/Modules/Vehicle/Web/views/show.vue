<script setup lang="ts">
defineProps<{
    vehicle: Module.Vehicle.VehicleData;
}>()
</script>

<template layout>
    <div class="vehicle">
        <h2 class="font-bold uppercase text-3xl">{{ vehicle.licence_plate }}</h2>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <label class="font-bold">VIN:</label>
            <p> {{ vehicle.vin }}</p>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-4">
            <label class="font-bold">Brand:</label>
            <p> {{ vehicle.brand }}</p>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-4">
            <label class="font-bold">Type:</label>
            <p> {{ vehicle.type }}</p>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-4">
            <label class="font-bold">Fuel type:</label>
            <p> {{ vehicle.fuelType }}</p>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-4">
            <label class="font-bold">Owner:</label>
            <p> {{ vehicle.owner }}</p>
        </div>
    </div>
</template>

<style scoped>

</style>
