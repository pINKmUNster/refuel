<script setup lang="ts">
</script>

<template>
    <nav>
        <ul class="flex space-x-6">
            <li>
                <NavLink
                    :href="route('homepage.index')"
                >Home
                </NavLink>
            </li>
            <li>
                <NavLink
                    :href="route('vehicle.index')"
                >Vehicles
                </NavLink>
            </li>
        </ul>
    </nav>
</template>
