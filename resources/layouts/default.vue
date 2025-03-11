<script setup lang="ts">
useHead({
    title: 'Refuel'
})
</script>
<template>
    <section class="bg-gray-200 p-6">
        <header class="flex justify-between">
            <div class="flex items-center">
                <router-link :href="route('homepage.index')">
                    <h1 class="text-lg font-bold">Refuel</h1>
                </router-link>
                <p class="ml-4 text-sm">Welcome Back</p>
            </div>
            <Nav/>
        </header>
    </section>
    <section class="p-6">
        <div class="mx-auto max-w-3xl">
            <slot/>
        </div>
    </section>
</template>
