<template>
    <Head title="Create Blog"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-2xl  font-bold">Create Blog</h1>

            <GenericInput label="Title" name="name" class="mb-4" v-model="form.name"
                          :error="form.errors.name"
            />
            <GenericDropdown label="City" name="cities" :items="cities"
                             :error="form.errors.city_id"
                             v-model="form.city_id"/>

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

const props = defineProps({
    cities: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    name: '',
    city_id: '',
    errors: {},
});

const submitForm = () => {
    console.log(form);
    form.post(route('admin.areas.store'));

};

</script>

<style scoped lang="scss">

</style>
