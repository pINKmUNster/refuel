<script setup lang="ts">
useHead({
    title: () => `New vehicle`
});

defineProps<{
    brands : Module.Vehicle.BrandData[];
    users : Module.User.UserNameData[];
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
        licencePlate: "",
        user_id: 0,
    }
});
</script>

<template layout>
    <h1 class="text-3xl">Add new vehicle</h1>
    <form @submit.prevent="vehicleForm.submit" class="mt-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="type">Type</label>
                <select name="type" id="type" v-model="vehicleForm.fields.type" class="w-full border rounded">
                    <option selected>Choose a type</option>
                    <option value="car">Car</option>
                    <option value="motorcycle">Motorcycle</option>
                    <option value="truck">Truck</option>
                    <option value="bus">Bus</option>
                    <option value="van">Van</option>
                    <option value="suv">SUV</option>
                    <option value="other">Other</option>
                </select>
                <span v-if="vehicleForm.errors.type" v-text="vehicleForm.errors.type"/>
            </div>
            <div>
                <label for="brand_id">Brand</label>
                <select  id="brand_id" v-model="vehicleForm.fields.brand_id" class="w-full border rounded">
                    <option selected>Choose a brand</option>
                    <option v-for="brand in brands" :value="brand.id" v-text="brand.label"/>
                </select>
            </div>
            <div>
                <label for="fuel_type">Fuel type</label>
                <div>
                    <div class="flex space-x-4">
                        <input v-model="vehicleForm.fields.fuel_type" type="radio" id="fuel_type-1" value="electric"/>
                        <label for="fuel_type-1">Electric</label>
                    </div>
                    <div class="flex space-x-4">
                        <input v-model="vehicleForm.fields.fuel_type" type="radio" id="fuel_type-2" value="gasoline"/>

                        <label for="fuel_type-2">Gasoline</label>
                    </div>
                    <div class="flex space-x-4">
                        <input v-model="vehicleForm.fields.fuel_type" type="radio" id="fuel_type-3" value="diesel"/>
                        <label for="fuel_type-3">Diesel</label>
                    </div>
                </div>
                <span v-if="vehicleForm.errors.fuel_type" v-text="vehicleForm.errors.fuel_type"/>
            </div>
            <div>
                <label for="vin">VIN</label>
                <input v-model="vehicleForm.fields.vin" type="text" id="vin" name="vin" class="w-full border rounded">
                <span v-if="vehicleForm.errors.vin" v-text="vehicleForm.errors.vin"/>
            </div>
            <div>
                <label for="licencePlate">Licence plate</label>
                <input v-model="vehicleForm.fields.licence_plate" type="text" id="licencePlate" name="licencePlate"
                       class="w-full border rounded">
                <span v-if="vehicleForm.errors.licence_plate" v-text="vehicleForm.errors.licence_plate"/>
            </div>
            <div>
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" v-model="vehicleForm.fields.user_id" class="w-full border rounded">
                    <option selected>Choose a user</option>
                    <option v-for="user in users" :value="user.id" v-text="user.name"/>
                </select>
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
