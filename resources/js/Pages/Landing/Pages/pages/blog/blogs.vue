<template>
    <Head title="Blog"/>
    <navbar :container="'container'" :navLight="'nav-light justify-end'" :logoLight="true"/>
        <!-- Start Hero -->
        <section
            class="relative table w-full py-32 lg:py-36 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-black opacity-80"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 text-center mt-10">
                    <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Blogs &
                        News
                    </h3>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="relative">
            <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End Hero -->

        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <blogs :grids="'grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]'" :data="props.blogs"/>
            </div>
        </section>
        <footers/>

</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import {Head} from '@inertiajs/vue3';
import footers from '@/Components/footers/footer.vue';
import blogs from '@/Components/blog/blogs.vue';

const props = defineProps({
    blogs: {
        type: Array,
        required: true,
    },
});
</script>

<style lang="scss" scoped></style>
