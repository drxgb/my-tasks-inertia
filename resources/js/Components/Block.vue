<template>
    <div class="h-full">
        <div class="flex flex-row-reverse mb-2" v-if="$slots.outer">
            <slot name="outer" />
        </div>

        <div class="h-full border border-slate-500 rounded-md bg-slate-600">
            <div class="bg-green-600 px-8 py-2 text-2xl font-semibold rounded-t-md border-b-2 border-b-green-700"
                v-if="$slots.header">
                <slot name="header" />
            </div>
            <div class="px-8 py-4">
                <slot />
            </div>
            <div class="border-t border-t-slate-900 bg-slate-700 rounded-b-md px-8 py-2 text-sm" v-if="$slots.footer">
                <slot name="footer" />
            </div>
        </div>
    </div>
</template>
