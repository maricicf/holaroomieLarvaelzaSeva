<template>
    <Head title="Properties"/>
    <admin-layout>

        <h1 class="text-2xl mt-5">Properties</h1>
        <dynamic-table :data="props.properties"/>

    </admin-layout>
</template>
<script setup>
import {Head} from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import DynamicTable from '@/Pages/Admin/Pages/components/DynamicTable.vue';

const props = defineProps({
    properties: {
        type: Array,
        required: true,
    },
});

</script>
<style scoped lang="scss">

</style>
