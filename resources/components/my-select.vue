<script setup lang="ts">
export interface SelectOption {
    value: string | number;
    label: string;
}

defineProps<{
    selectOptions: SelectOption[];
    label: string;
    name: string;
}>()

const value = defineModel();
</script>

<template>
    <div>
        <label :for="name">{{ label }}</label>
        <select :name="name" :id="name" v-model="value" class="w-full border rounded">
            <slot name="option"></slot>
            <option v-for="option in selectOptions" :value="option.value" v-text="option.label"/>
        </select>
        <slot name="errors"></slot>
    </div>
</template>

<style scoped>

</style>
