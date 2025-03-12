<script setup lang="ts">

const refresh = () => {
    const myRoute = route('fuel.refresh');
    router.post(myRoute);
}


</script>

<template layout>
    <div>
        <div class="flex justify-between items-center">
            <h1 class="text-4xl">Fuel prices</h1>
            <primary-button @click="refresh">
                Refresh
            </primary-button>
        </div>
    </div>

</template>

<style scoped>

</style>
