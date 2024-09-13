<template>
    <Head title="Specification Categories"/>
    <admin-layout>
        <h1 class="text-2xl m-4 font-bold">Specification Categories</h1>
                <span v-if="page.props.flash.success" class="text-green-500">
                    {{ page.props.flash.success }}
                </span>
        <dynamic-table :data="props.categories"
                       :configuration="{icon: 'icon',single_answer:'boolean'}"
                       create-route="admin.specification-categories.create"
        />
    </admin-layout>
</template>
<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import DynamicTable from '@/Pages/Admin/Pages/components/DynamicTable.vue';

const page = usePage();

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
});

</script>


<style scoped lang="scss">

</style>
