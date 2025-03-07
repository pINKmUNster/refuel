<script setup lang="ts">
defineProps<{
    vehicle: Module.Vehicle.VehicleData;
}>()
</script>

<template>
    <div class="border-1 border-gray-200 p-4 rounded-lg">
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
