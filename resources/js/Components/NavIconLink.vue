<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    href: String,
    icon: String,
});

const classes = computed(() => "transition duration-200");
</script>

<template>
    <Link :href="href" :class="classes">
        <template v-if="icon">
            <font-awesome-icon :icon="icon" />
        </template>
        <span>
            <slot />
        </span>
    </Link>
</template>
