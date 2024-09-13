<template>
    <Head title="Properties"/>

    <navbar class="bg-white dark:bg-slate-900" :container="'container bg-white'" :logoLight=true
            :navLight="'nav-dark justify-end'"/>

    <!-- Start -->
    <section class="relative">
        <div class="container-fluid">
            <div class="grid lg:grid-cols-2 md:grid-cols-2">
                <div>
                    <div class="relative mt-12 md:p-8 py-8 px-3">
                        <div class="grid grid-cols-1">
                            <filters :grids="'grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6'"
                                     :areas="props.areas" :cities="props.cities"
                                     :specificationCategories="props.specificationCategories"/>
                        </div><!--end grid-->
                        <properties :properties="props.properties" :grids="'grid grid-cols-1 gap-[30px] mt-8'"
                                    :width="'xl:w-96'"/>
                    </div>

                </div>

                <div class="relative md:block hidden">
                    <div class="map border-0 fixed w-full leading-[0]">
                        <Map :pins="pins" class="w-1/2 h-screen"/>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import filters from '@/Components/filters/filters.vue';
import pagination from '@/Components/pagination.vue';
import properties from '@/Components/featured-properties/properties.vue';
import {Head} from '@inertiajs/vue3';
import Map from '@/Components/Map.vue';
import {computed, onMounted} from 'vue';

const props = defineProps({
        properties: {
            type: Array,
            required: true,
        },
        specificationCategories: {
            type: Array,
            required: false,
            default: () => [],
        },
        areas: {
            type: Array,
            required: false,
            default: () => [],
        },
        cities: {
            type: Array,
            required: false,
            default: () => [],
        },
    })
;

const pins = computed(() => {
    return props.properties.map((property) => {
        return {
            latitude: Number(property.latitude),
            longitude: Number(property.longitude),
            title: property.title,
            id: property.id,
            image: property.images[0].path ?? 'test.png',
        };
    });
});

</script>

<style lang="scss" scoped></style>
