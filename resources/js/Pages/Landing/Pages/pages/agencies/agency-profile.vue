<template>
    <navbar :container="'container'" :navLight="'justify-end'" />

    <section class="relative md:py-24 pt-24 pb-16">
        <agency />
    </section>
    <footers />
    <switcher />
</template>

<script setup>
import navbar from '@/components/navbar/navbar.vue';
import agency from '@/components/agencies/agency-profile.vue';
import switcher from '@/components/switcher.vue';
import footers from '@/components/footers/footer.vue';
</script>

<style lang="scss" scoped></style>