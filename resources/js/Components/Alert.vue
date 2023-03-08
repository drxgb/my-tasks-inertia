<script setup>
defineProps({
    type: {
        type: String,
        default: 'info',
    },
});
</script>


<template>
    <div class="flex gap-x-8 items-center border rounded-md px-8 py-4 relative" :class="`alert-${type}`">
        <h1 class="text-5xl">
            <font-awesome-icon icon="circle-info" v-if="type === 'info'" />
            <font-awesome-icon icon="circle-check" v-if="type === 'success'" />
            <font-awesome-icon icon="triangle-exclamation" v-if="type === 'warning'" />
            <font-awesome-icon icon="circle-xmark" v-if="type === 'danger'" />
        </h1>
        <h4 class="text-lg">
            <slot />
        </h4>
    </div>
</template>
