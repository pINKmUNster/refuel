<script setup lang="ts">
import PrimaryButton from "@/components/primary-button.vue";
import SecondaryButton from "@/components/secondary-button.vue";

defineProps<{
    vehicle: Module.Vehicle.VehicleData;
}>();

const emit = defineEmits<{
    deleteVehicle: [id: number];
    showVehicle: [id: number];
}>()
</script>

<template>
    <div class="border-1 border-gray-200 p-4 rounded-lg">
        <h2 class="font-bold uppercase">{{ vehicle.licencePlate }}</h2>
        <p>{{ vehicle.vin }}</p>
        <p>{{ vehicle.brand }}</p>
        <p>{{ vehicle.type }}</p>
        <p>{{ vehicle.fuelType }}</p>
        <p>{{ vehicle.owner }}</p>

        <span class="flex justify-end mt-4 gap-2">
            <primary-button
                @click="() => emit('showVehicle', vehicle.id)">Show</primary-button>
            <secondary-button @click="() => emit('deleteVehicle', vehicle.id)">Delete</secondary-button>
        </span>
    </div>
</template>

<style scoped>

</style>
