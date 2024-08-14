<template>
    <Head title="Home"/>

    <navbar :logoLight=true :navLight="'nav-light justify-end'" :container="'container'"/>
    <!-- Hero Start -->
    <section class="relative table w-full py-36 lg:py-44 overflow-hidden zoom-image">
        <div
            class="absolute inset-0 image-wrap z-1 bg-[url('/assets/images/bg/04.jpg')] bg-no-repeat bg-center bg-cover">
        </div>
        <div class="absolute inset-0 bg-black/70 z-2"></div>
        <div class="container relative z-3">
            <div class="grid grid-cols-1 mt-10">
                <div class="text-center">
                    <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Easy way
                        to find your <br> dream property</h1>
                    <p class="text-white/70 text-xl max-w-xl mx-auto">A great plateform to buy, sell and rent your
                        properties without any agent or commisions.</p>
                </div>

                <homefilters/>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <transpatency :transparency="true"/>
        </div>
        <div class="container relative lg:mt-24 mt-16">
            <howitwork/>
        </div>
        <properties :data="props.properties"/>
    </section>
    <cta/>
    <section class="pt-10">
        <features/>
    </section><!--end section-->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <client/>
        </div>
        <getintouch/>
    </section>
    <!--    <switcher :back="false"/>-->
    <footers/>

</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import homefilters from '@/Components/filters/home-filters.vue';
import switcher from '@/Components/switcher.vue';
import transpatency from '@/Components/transparency-control.vue';
import howitwork from '@/Components/how-it-work.vue';
import properties from '@/Components/featured-properties/featured-properties-slider.vue';
import cta from '@/Components/cta/cta.vue';
import features from '@/Components/features.vue';
import client from '@/Components/clients/client-slider.vue';
import getintouch from '@/Components/get-in-touch.vue';
import footers from '@/Components/footers/footer.vue';
import {Head} from '@inertiajs/vue3';
import {onMounted} from 'vue';

const props = defineProps({
    properties: {
        type: Object,
        required: true,
    },
});


</script>

<style lang="scss" scoped></style>
