<template>
    <Head title="Create Blog"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-2xl  font-bold">Create Hotspot</h1>

            <GenericInput label="Title" name="name" class="mb-4" v-model="form.name"
                          :error="form.errors.name"
            />
            <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4" @click="submitForm">Submit</button>
        </div>
    </admin-layout>
</template>

<script setup>
import {Head, useForm, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import {ref} from 'vue';
import GenericInput from '@/Pages/Admin/Pages/components/GenericInput.vue';
import FileInput from '@/Pages/Admin/Pages/components/FileInput.vue';
import GenericDropdown from '@/Pages/Admin/Pages/components/GenericDropdown.vue';

import Editor from '@tinymce/tinymce-vue';

const page = usePage();

const form = useForm({
    name: '',
    errors: {},
});

const submitForm = () => {
    form.post(route('admin.hotspots.store'));

};

</script>

<style scoped lang="scss">

</style>
