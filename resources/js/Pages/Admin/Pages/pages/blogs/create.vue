<template>
    <Head title="Create Blog"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-2xl  font-bold">Create Blog</h1>

            <GenericInput label="Title" name="title" class="mb-4" v-model="form.title"
                          :error="form.errors.title"
            />

            <Editor
                api-key="k60qhq9tug91z5nvxxhuc047mef5zwcrhsun50wq8mta48s1"
                v-model="form.content"
            />

            <FileInput label="Image" class="mb-4" name="image" v-model="form.image" :error="form.errors.image"/>

            <GenericDropdown label="Blog Category" name="category_id" :items="blogCategories"
                             :error="form.errors.blog_category_id"
                             v-model="form.blog_category_id"/>

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
    blogCategories: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    title: '',
    content: ref(''),
    image: null,
    blog_category_id: '',
    errors: {},
});

const submitForm = () => {
    console.log(form);
    form.post(route('admin.blog.store'));

};

</script>

<style scoped lang="scss">

</style>
