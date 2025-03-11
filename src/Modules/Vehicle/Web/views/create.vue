<script setup lang="ts">

import {SelectOption} from "@/components/my-select.vue";
import {RadioOption} from "@/components/my-radio.vue";

useHead({
    title: () => `New vehicle`
});

let props = defineProps<{
    brands: Module.Vehicle.BrandData[];
    users: Module.User.UserNameData[];
}>()

const vehicleForm = useForm<Module.Vehicle.Web.StoreVehicleRequestData>({
    method: "POST",
    url: route("vehicle.store"),
    reset: true,
    fields: {
        type: "car",
        brand_id: 0,
        fuel_type: 'gasoline',
        vin: "",
        licence_plate: "",
        user_id: 0,
    }
});

let typeSelectOptions: Array<SelectOption> = [
    {value: "car", label: "Car"},
    {value: "motorcycle", label: "Motorcycle"},
    {value: "truck", label: "Truck"},
    {value: "bus", label: "Bus"},
    {value: "van", label: "Van"},
    {value: "suv", label: "SUV"},
    {value: "other", label: "Other"},
];

let brandSelectOptions: Array<SelectOption> = props.brands.map(brand => {
    return {value: brand.id, label: brand.label};
});

let userSelectOptions: Array<SelectOption> = props.users.map(
    user => {
        return {value: user.id, label: user.name};
    }
)

let radioOptions: Array<RadioOption> = [
    {value: "electric", label: "Electric"},
    {value: "gasoline", label: "Gasoline"},
    {value: "diesel", label: "Diesel"},
];

</script>

<template layout>
    <h1 class="text-3xl">Add new vehicle</h1>
    <form @submit.prevent="vehicleForm.submit" class="mt-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <my-select
                    v-model="vehicleForm.fields.type"
                    :select-options="typeSelectOptions"
                    label="Type"
                    name="type"
                >
                    <template #option>
                        <option selected>Choose a type</option>
                    </template>
                    <template #errors>
                        <span v-if="vehicleForm.errors.type" v-text="vehicleForm.errors.type"/>
                    </template>
                </my-select>
            </div>
            <div>
                <my-select
                    v-model="vehicleForm.fields.brand_id"
                    :select-options="brandSelectOptions"
                    label="Brand"
                    name="brand_id"
                >
                    <template #option>
                        <option selected>Choose a brand</option>
                    </template>
                    <template #errors>
                        <span v-if="vehicleForm.errors.brand_id" v-text="vehicleForm.errors.brand_id"/>
                    </template>
                </my-select>
            </div>
            <div>
                <my-radio
                    v-model="vehicleForm.fields.fuel_type"
                    :radio-options="radioOptions"
                    label="Fuel type"
                    name="fuel_type"
                >
                    <template #errors>
                        <span v-if="vehicleForm.errors.fuel_type" v-text="vehicleForm.errors.fuel_type"/>
                    </template>
                </my-radio>
            </div>
            <div>
                <label for="vin">VIN</label>
                <input v-model="vehicleForm.fields.vin" type="text" id="vin" name="vin" class="w-full border rounded">
                <span v-if="vehicleForm.errors.vin" v-text="vehicleForm.errors.vin"/>
            </div>
            <div>
                <label for="licence_plate">Licence plate</label>
                <input v-model="vehicleForm.fields.licence_plate" type="text" id="licence_plate" name="licence_plate"
                       class="w-full border rounded">
                <span v-if="vehicleForm.errors.licence_plate" v-text="vehicleForm.errors.licence_plate"/>
            </div>
            <div>
                <my-select
                    v-model="vehicleForm.fields.user_id"
                    :select-options="userSelectOptions"
                    label="User"
                    name="user_id"
                >
                    <template #option>
                        <option selected>Choose a user</option>
                    </template>
                    <template #errors>
                        <span v-if="vehicleForm.errors.user_id" v-text="vehicleForm.errors.user_id"/>
                    </template>
                </my-select>
            </div>
        </div>
        <div class="flex justify-end mt-4 space-x-4">
            <primary-button type="submit">Save</primary-button>
            <secondary-button @click="vehicleForm.reset">Reset</secondary-button>
        </div>

    </form>
</template>

<style scoped>

</style>
