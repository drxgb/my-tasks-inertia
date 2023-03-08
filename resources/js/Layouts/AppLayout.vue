<script setup>
import { ref, computed } from 'vue';
import NavIconLink from "@/Components/NavIconLink.vue";
import { usePage } from '@inertiajs/vue3';

const year = ref(new Date().getFullYear());
const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <header class="bg-green-600 px-12 py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl font-semibold">
                <NavIconLink :href="route('home')" :icon="$page.props.appIcon">
                    {{ $page.props.appName }}
                </NavIconLink>
            </h1>

            <nav class="flex justify-between gap-x-4 flex-row-reverse">
                <template v-if="user">
                    <NavIconLink :href="route('logout')" icon="door-open" method="post" as="button">
                        Logout
                    </NavIconLink>
                    <span>Welcome, {{ user.name }}!</span>
                </template>
                <template v-else>
                    <NavIconLink :href="route('login')" icon="right-to-bracket">
                        Login
                    </NavIconLink>
                    <NavIconLink :href="route('register')" icon="key">
                        Register
                    </NavIconLink>
                </template>
            </nav>
        </div>
    </header>

    <section class="overflow-y-auto h-full">
        <div class="mx-auto w-5/6 my-20">
            <slot />
        </div>
    </section>

    <footer class="bg-green-600 px-12 py-8 flex justify-end">
        <p>
            &copy;
            {{ year }} - Made with
            <font-awesome-icon icon="heart" class="text-red-600 font-bold" />
            by Dr.XGB
        </p>
    </footer>
</template>
