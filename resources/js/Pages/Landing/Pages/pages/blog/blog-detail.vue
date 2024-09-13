<template>
    <Head :title="data.title"/>
    <navbar :container="'container'" :logoLight=true :navLight="'nav-light justify-end'"/>

    <blogdetail :data="data"/>
    <footers/>
</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import blogdetail from '@/Components/blog/blog-detail.vue';
import footers from '@/Components/footers/footer.vue';
import {Head} from '@inertiajs/inertia-vue3';

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});

</script>

<style lang="scss" scoped></style>
