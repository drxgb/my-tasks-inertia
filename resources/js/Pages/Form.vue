<script setup>
import { ref, computed, onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    todo: {
        id: Number,
        task: String,
        done: Boolean,
        important: Boolean,
    },
    isEdit: {
        type: Boolean,
        default: false,
    },
});
const form = useForm(props.todo);
const errors = computed(() => form.errors);
const taskInput = ref(null);
const emit = defineEmits(['close']);

const submit = () => {
    const onSuccess = () => emit('close');

    if (props.isEdit) {
        form.put(route('todo.update', form), { onSuccess });
    }
    else {
        form.post(route('todo.store'), { onSuccess });
    }
};
const close = () => {
    form.clearErrors();
    form.cancel();
    emit('close');
};
</script>


<template>
    <form @submit.prevent="submit" class="px-9 py-4">
        <h1 class="text-3xl my-4">
            {{ isEdit ? 'Edit' : 'New' }} Task
        </h1>
        <div class="my-4">
            <div class="mb-4">
                <InputLabel for="task">Task</InputLabel>
                <TextInput v-model="form.task" placeholder="e.g. Play with the cat" class="mt-1 block w-full px-4 py-2"
                    id="task" />
                <small v-if="errors.task" class="text-red-400 text-xs">{{ errors.task }}</small>
            </div>
            <div class="mb-4">
                <input type="checkbox" v-model="form.important" id="important" />
                <label for="important" class="text-sm ml-2">Important</label>
            </div>
        </div>
        <div class="flex gap-x-2 justify-end">
            <PrimaryButton type="submit">
                <font-awesome-icon icon="floppy-disk" />
                <span class="ml-2">Save</span>
            </PrimaryButton>
            <SecondaryButton @click="close">
                <font-awesome-icon icon="xmark" />
                <span class="ml-2">Cancel</span>
            </SecondaryButton>
        </div>
    </form>
</template>
