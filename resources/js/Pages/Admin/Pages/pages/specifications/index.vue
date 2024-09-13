<template>
    <Head title="Utilities"/>
    <admin-layout>
        <h1 class="text-2xl m-4 font-bold">Utilities</h1>
        <span v-if="page.props.flash.success" class="text-green-500">
            {{ page.props.flash.success }}
        </span>
        <dynamic-table :data="props.utilities" create-route="admin.utilities.create"
                       delete-route="admin.specifications.delete"
                       :configuration="{icon: 'icon'}"
        />
    </admin-layout>
</template>

<script setup>

import {Head, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import DynamicTable from '@/Pages/Admin/Pages/components/DynamicTable.vue';

const page = usePage();

const props = defineProps({
    utilities: {
        type: Array,
        required: true,
    },
});

</script>
<style scoped lang="scss"></style>
