<script setup lang="ts">
defineProps<{
    href: string;
    active?: boolean;
}>();
</script>

<template>
    <router-link
        :href="href"
        class="text-black hover:underline"
        :class="{
            'font-bold underline': active,
        }"
    >
        <slot/>
    </router-link>
</template>

<style scoped>

</style>
