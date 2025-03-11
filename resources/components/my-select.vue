<script setup lang="ts">
import {Label} from "reka-ui";

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
        <Label :for="name">{{ label }}</Label>
        <select :name="name" :id="name" v-model="value" class="w-full border rounded">
            <slot name="option"></slot>
            <option v-for="option in selectOptions" :value="option.value" v-text="option.label"/>
        </select>
        <slot name="errors"></slot>
    </div>
</template>

<style scoped>

</style>
