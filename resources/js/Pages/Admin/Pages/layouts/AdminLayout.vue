<template>
    <div class="page-wrapper" :class="toggle === true ? 'toggled' : ''">
        <sidebar/>
        <main class="page-content bg-gray-50 dark:bg-slate-800 p-4">
            <!--            <headers :handlerClick="toggled"/>-->

            <slot/>
        </main>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import sidebar from '@/Components/Admin/sidebar/sidebar.vue';
import headers from '@/Components/Admin/header/header.vue';
import dashboard from '@/Components/Admin/dashboard.vue';
import footers from '@/Components/Admin/footer/footer.vue';

const toggle = ref(true);

function toggled() {
    toggle.value = !toggle.value;
}
</script>

<style lang="scss" scoped></style>
