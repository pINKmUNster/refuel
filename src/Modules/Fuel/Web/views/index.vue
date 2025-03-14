<script setup lang="ts">

const refresh = () => {
    const myRoute = route('fuel.refresh');
    router.post(myRoute);
}

const props = defineProps<{
    fuelPrices: Paginator<Module.Fuel.Models.FuelPriceData>
}>()


</script>

<template layout>
    <div>
        <div class="flex justify-between items-center">
            <h1 class="text-4xl">Fuel prices</h1>
            <secondary-button @click="() => router.get(route('fuel.charts'))">
                Charts
            </secondary-button>
            <primary-button @click="refresh">
                Refresh
            </primary-button>
        </div>

        <div>
            <table class="w-full mt-4">
                <thead class="bg-gray-50">
                    <tr class="text-center">
                        <th>Date</th>
                        <th>Fuel type</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="fuelPrice in fuelPrices.data" :key="fuelPrice.id" class="text-center border-t border-gray-200">
                    <td>{{ useDateFormat(fuelPrice.date, 'DD-MM-YYYY') }}</td>
                    <td>{{ fuelPrice.fuel_type }}</td>
                    <td>{{ fuelPrice.price }} €</td>
                </tr>
                </tbody>
            </table>
            <div v-if="fuelPrices?.meta" class=" mt-4 ml-auto flex items-center justify-between">
                <nav class="relative z-0 inline-flex -space-x-px rounded-md" aria-label="Pagination">
                    <router-link
                        :disabled="!fuelPrices.meta.prev_page_url"
                        :href="fuelPrices.meta.prev_page_url"
                        class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white p-2 text-sm font-medium text-gray-500 hover:bg-gray-50"
                    >
                        <span class="sr-only">Previous</span>
                        <i-heroicons-solid-chevron-left class="size-5" aria-hidden="true"/>
                    </router-link>

                    <router-link
                        v-for="item in fuelPrices.links?.filter((_, i, { length }) => i !== 0 && i !== length - 1)"
                        :key="item.label"
                        :disabled="item.active || !item.url"
                        :href="item.url"
                        class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium hover:bg-gray-50"
                        :class="{
								'border-brand-taupe z-10 bg-gray-50 text-gray-800': item.active,
								'border-gray-300 bg-white text-gray-500 hover:bg-gray-50': !item.active,
							}"
                        v-text="item.label"
                    />

                    <router-link
                        :disabled="!fuelPrices.meta.next_page_url"
                        :href="fuelPrices.meta.next_page_url"
                        class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white p-2 text-sm font-medium text-gray-500 hover:bg-gray-50"
                    >
                        <span class="sr-only">Next</span>
                        <i-heroicons-solid-chevron-right class="size-5" aria-hidden="true"/>
                    </router-link>
                </nav>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
