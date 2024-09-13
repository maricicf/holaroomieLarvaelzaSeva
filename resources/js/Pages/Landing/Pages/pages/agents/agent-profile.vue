<template>
    <Head title="User Profile"/>
    <navbar :container="'container'" :navLight="'justify-end'"/>

    <section class="relative md:py-24 pt-24 pb-16">
        <agents :user="props.user"/>
    </section>
    <footers/>
</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import agents from '@/Components/agent-profile.vue';
import footers from '@/Components/footers/footer.vue';
import {Head} from '@inertiajs/vue3';

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

</script>

<style lang="scss" scoped></style>
