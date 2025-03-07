<script setup lang="ts">
import Nav from '@/components/nav.vue'

useHead({
    title: 'Refuel'
})
</script>

<template>
    <section class="bg-gray-200 p-6">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="text-lg font-bold">Refuel</h1>
                <p class="ml-4 text-sm">Welcome Back</p>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="mx-auto max-w-3xl">
            <slot />
        </div>
    </section>
</template>

<style scoped>

</style>
