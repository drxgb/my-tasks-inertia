<script setup>
import moment from 'moment';
import { useForm } from '@inertiajs/vue3';
import { reactive, computed } from 'vue';

const props = defineProps({
    todo: {
        id: Number,
        task: String,
        done: Boolean,
        important: Boolean,
        created_at: String,
        modified_at: String,
    }
});
const form = useForm(props.todo);
const done = computed({
    get() {
        return props.todo.done == 1;
    },

    set(val) {
        props.todo.done = val;
    }
});
const emit = defineEmits(['edit', 'delete', 'check']);

const dateFormat = (time, format) => {
    if (!format)
        format = 'DD/MM/YYYY - HH:mm:ss';
    return moment(time).format(format);
};
</script>


<template>
    <div class="flex items-center gap-x-2 px-4 py-2"
        :class="{ 'bg-yellow-500 border border-yellow-200 rounded-md': todo.important }">
        <input type="checkbox" v-model="done" @change="$emit('check', todo)" />
        <div class="flex justify-between w-full">
            <div>
                <h1 class="text-lg" :class="{ 'line-through': todo.done }">
                    {{ todo.task }}
                </h1>
                <small :class="{ 'line-through': todo.done }">
                    <em>
                        Created at: {{ dateFormat(todo.created_at) }}
                    </em>
                    <em v-if="todo.updated_at !== todo.created_at">
                        - Last Update: {{ dateFormat(todo.updated_at) }}
                    </em>
                </small>
            </div>
            <div class="flex gap-x-2">
                <button @click="$emit('edit', todo)" class="text-blue-400 hover:text-blue-600 transition duration-200">
                    <font-awesome-icon icon="edit" />
                </button>
                <form @submit.prevent="$emit('delete', form)">
                    <button type="submit" class="text-red-500 hover:text-red-400 transition duration-200">
                        <font-awesome-icon icon="trash-can" />
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
