<script setup>
import { ref, reactive, computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Block from '@/Components/Block.vue';
import Todo from '@/Components/Todo/Todo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import Form from './Form.vue';
import Alert from '@/Components/Alert.vue';

const todos = computed(() => usePage().props.todos);
const message = computed(() => usePage().props.flash.message);
const showModal = ref(false);
const isEdit = ref(false);
let todo = reactive({});

const showForm = () => showModal.value = true;
const hideForm = () => showModal.value = false;
const createTodo = () => {
    todo = reactive({
        id: null,
        task: '',
        done: false,
        important: false,
    });
    isEdit.value = false;
    showForm();
};
const editTodo = t => {
    todo = t;
    isEdit.value = true;
    showForm();
};
const checkTodo = t => {
    const form = useForm(t);
    form.patch(route('todo.update', form));
};
const deleteTodo = form => form.delete(route('todo.destroy', form));
</script>


<template>
    <div class="mb-4">
        <Alert v-if="message" type="success">
            {{ message }}
        </Alert>
    </div>
    <Block>
        <template #outer>
            <PrimaryButton type="button" @click="createTodo">
                <font-awesome-icon icon="add" />
                <span class="ml-2">New Task</span>
            </PrimaryButton>
        </template>

        <Todo v-for="todo in todos" :key="todo.id" :todo="todo" @edit="todo => editTodo(todo)" @check="checkTodo"
            @delete="form => deleteTodo(form)" />
        <div v-if="!todos.length" class="text-3xl font-semibold text-center">
            No tasks to do for now...
        </div>
    </Block>

    <Modal :show="showModal" :closeable="true" v-if="todos.length">
        <Form :todo="todo" :isEdit="isEdit" @close="hideForm" />
    </Modal>
</template>
