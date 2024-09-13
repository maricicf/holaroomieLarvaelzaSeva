<template>
    <Head title="Add Specification"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-xl  font-bold">Add Specification Category</h1>

            <GenericInput label="Category Name" name="category_name" v-model="createSpecificationCategoryForm.name"
                          :error="createSpecificationCategoryForm.errors.name"
                          class="mb-4" :required="true"/>

            <GenericInput label="Icon name" name="icon" v-model="createSpecificationCategoryForm.icon"
                          :error="createSpecificationCategoryForm.errors.icon"
                          class="mb-4"/>

            <label class="block text-sm font-medium text-gray-700 mb-2">Is Single Answer</label>
            <input type="checkbox" name="is_single_answer" v-model="createSpecificationCategoryForm.is_single_answer"
                   class="form-checkbox h-5 w-5 text-blue-600"><br>

            <button class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    @click="submitForm">
                Submit
            </button>
        </div>
    </admin-layout>
</template>
<script setup>
import {Head, useForm} from '@inertiajs/vue3';

import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import GenericDropdown from '@/Pages/Admin/Pages/components/GenericDropdown.vue';
import GenericInput from '@/Pages/Admin/Pages/components/GenericInput.vue';

const createSpecificationCategoryForm = useForm({
    name: '',
    icon: '',
    is_single_answer: '',
});

const submitForm = () => {
    createSpecificationCategoryForm.post(route('admin.specification-categories.store'));
};
</script>

<style scoped lang="scss">

</style>
