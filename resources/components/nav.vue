<script setup lang="ts">
import NavLink from "@/components/nav-link.vue";
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
