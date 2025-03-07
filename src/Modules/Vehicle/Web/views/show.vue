<script setup lang="ts">
defineProps<{
    vehicle: Module.Vehicle.VehicleData;
}>()
</script>

<template layout>
    <div class="vehicle">
        <h2 class="font-bold uppercase">{{ vehicle.licencePlate }}</h2>
        <p>{{ vehicle.vin }}</p>
        <p>{{ vehicle.brand }}</p>
        <p>{{ vehicle.type }}</p>
        <p>{{ vehicle.fuelType }}</p>
        <p>{{ vehicle.owner}}</p>
    </div>
</template>

<style scoped>

</style>
