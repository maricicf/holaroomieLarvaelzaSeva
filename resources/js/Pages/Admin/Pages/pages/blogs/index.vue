<template>
    <Head title="Blogs"/>
    <admin-layout>
        <h1 class="text-2xl m-4 font-bold">Blogs</h1>
        <span v-if="page.props.flash.success" class="text-green-500">
            {{ page.props.flash.success }}
        </span>
        <dynamic-table :data="blogs" create-route="admin.blog.create"
                       :image-root="'blogs/'" :configuration="{image: 'image'}"
        />
    </admin-layout>
</template>

<script setup>

import {Head, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import DynamicTable from '@/Pages/Admin/Pages/components/DynamicTable.vue';

const page = usePage();

const props = defineProps({
    blogs: {
        type: Array,
        required: true,
    },
});
</script>

<style scoped lang="scss">

</style>
