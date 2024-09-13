<template>

    <Head title="Add Specification"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-xl  font-bold">Add Specification</h1>

            <GenericInput label="Utility Name" name="utility_name" v-model="createSpecificationForm.name"
                          :error="createSpecificationForm.errors.name"
                          class="mb-4" :required="true"/>

            <GenericInput label="Icon name" name="icon" v-model="createSpecificationForm.icon"
                          :error="createSpecificationForm.errors.icon"
                          class="mb-4"/>

            <GenericDropdown label="Category" name="specification_category" :items="specificationCategories"
                             :required="true"
                             v-model="createSpecificationForm.category_id"/>

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

const createSpecificationForm = useForm({
    name: '',
    icon: '',
    category_id: '',
});

const props = defineProps({
    specificationCategories: {
        type: Array,
        required: true,
    },
});

const submitForm = () => {
    createSpecificationForm.post(route('admin.specifications.store'));
};
</script>

<style scoped lang="scss">

</style>
