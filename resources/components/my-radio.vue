<script setup lang="ts">
export interface RadioOption {
    value: string | number;
    label: string;
}

defineProps<{
    radioOptions: RadioOption[];
    label: string;
    name: string;
}>();

const value = defineModel();
</script>

<template>

    <div>
        <label :for="name">{{ label }}</label>
        <div class="flex space-x-4">
            <template v-for="option in radioOptions">
                <input :id="`${name}-${option.value}`" :name="name" :value="option.value" type="radio" v-model="value">
                <label :for="`${name}-${option.value}`" v-text="option.label"/>
            </template>
        </div>
        <slot name="errors"/>
    </div>
</template>

<style scoped>

</style>
