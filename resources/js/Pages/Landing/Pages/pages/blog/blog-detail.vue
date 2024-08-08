<template>
    <navbar :container="'container'" :logoLight=true :navLight="'nav-light justify-end'" />

    <blogdetail />
    <footers />
</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import blogdetail from '@/Components/blog/blog-detail.vue';
import footers from '@/Components/footers/footer.vue';
</script>

<style lang="scss" scoped></style>
