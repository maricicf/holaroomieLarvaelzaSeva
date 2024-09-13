<template>

    <Head title="Properties"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-2xl mt-3 font-semibold">Properties</h1>

            <div v-if="page.props.flash.success"
                 class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-5"
                 role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ page.props.flash.success }}</span>
            </div>

            <dynamic-table :data="props.properties" create-route="admin.properties.create"
                           :configuration="{image:'image'}"
                           image-root="property/single/"
                           delete-route="admin.properties.delete"/>
        </div>
    </admin-layout>
</template>
<script setup>

import {Head, usePage} from '@inertiajs/vue3';
import DynamicTable from '@/Pages/Admin/Pages/components/DynamicTable.vue';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';

const props = defineProps({
    properties: {
        type: Array,
        required: true,
    },
});

const page = usePage();

</script>

<style scoped lang="scss">

</style>
