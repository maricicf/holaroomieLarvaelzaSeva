<template>
    <Head title="Messages"/>
    <admin-layout>
        <div class="p-4">
            <h1 class="text-xl  font-bold">Messages</h1>
            <dynamic-table :data="messages"
                           :delete-route="'admin.messages.delete'"
            />
        </div>
    </admin-layout>
</template>
<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import DynamicTable from '@/Pages/Admin/Pages/components/DynamicTable.vue';

const props = defineProps({
    messages: {
        type: Array,
        required: true,
    },
});
</script>


<style scoped lang="scss">

</style>
