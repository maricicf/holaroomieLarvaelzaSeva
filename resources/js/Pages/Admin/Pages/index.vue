<template>
    <admin-layout>
        <dashboard/>
    </admin-layout>
</template>

<script setup>
import {ref} from 'vue';
import sidebar from '@/Components/Admin/sidebar/sidebar.vue';
import headers from '@/Components/Admin/header/header.vue';
import dashboard from '@/Components/Admin/dashboard.vue';
import footers from '@/Components/Admin/footer/footer.vue';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';

const toggle = ref(true);

function toggled() {
    toggle.value = !toggle.value;
}
</script>

<style lang="scss" scoped></style>
