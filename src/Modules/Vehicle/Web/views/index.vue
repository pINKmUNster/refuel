<script setup lang="ts">


useHead({
    title: () => `Vehicles`
})

defineProps<{
    vehicles: Module.Vehicle.VehicleData
}>()
</script>

<template layout>
    <div class="vehicles">
        <h1>Vehicles</h1>

    </div>
</template>

<style scoped>

</style>
