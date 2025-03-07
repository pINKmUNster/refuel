<script setup lang="ts">
import VehicleCard from "~/src/Modules/Vehicle/Web/views/components/vehicle-card.vue";

useHead({
    title: () => `Vehicles`
})

defineProps<{
    vehicles: Module.Vehicle.VehicleData
}>()
const showVehicle = (id: number) => {
    const myRoute = route('vehicle.show', {id: id});
    router.get(myRoute);
}

const deleteVehicle = (id: number) => {
    const myRoute = route('vehicle.destroy', {id: id});
    router.delete(myRoute);
}


</script>

<template layout>
    <div class="vehicles">
        <h1 class="text-3xl">Vehicles</h1>
        <div class="grid grid-cols-3 gap-4 mt-4">
            <vehicle-card
                v-for="vehicle in vehicles"
                :key="vehicle.id"
                :vehicle="vehicle"
                @showVehicle="showVehicle"
                @deleteVehicle="deleteVehicle"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
