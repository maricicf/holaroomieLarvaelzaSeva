<template>
    <div class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Featured Properties
            </h3>

            <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                any agent or commisions.</p>
        </div><!--end grid-->

        <div class="grid grid-cols-1 mt-8 relative">
            <div class="tiny-home-slide-three">
                <div v-for="item in props.data" :key="item" class="tiny-slide">
                    <PropertyCard :item="item"/>
                </div>
            </div>
        </div><!--en grid-->
    </div><!--end container-->
</template>

<script setup>
import {ref, onMounted} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';
import {tns} from 'tiny-slider/src/tiny-slider';
import PropertyCard from '@/PropertyCard.vue';

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const datas = ref([
    {
        id: 1,
        image: 'assets/images/property/1.jpg',
        name: '10765 Hillshire Ave, Baton Rouge, LA 70810, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 2,
        image: 'assets/images/property/2.jpg',
        name: '59345 STONEWALL DR, Plaquemine, LA 70764, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 3,
        image: 'assets/images/property/3.jpg',
        name: '3723 SANDBAR DR, Addis, LA 70710, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 4,
        image: 'assets/images/property/4.jpg',
        name: 'Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 5,
        image: 'assets/images/property/5.jpg',
        name: '710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 6,
        image: 'assets/images/property/6.jpg',
        name: '5133 MCLAIN WAY, Baton Rouge, LA 70809, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
]);

onMounted(() => {
    tns({
        container: '.tiny-home-slide-three',
        controls: true,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: 'bottom',
        controlsText: ['<i class="mdi mdi-chevron-left "></i>', '<i class="mdi mdi-chevron-right"></i>'],
        nav: false,
        speed: 400,
        gutter: 0,
        responsive: {
            992: {
                items: 3,
            },

            767: {
                items: 2,
            },

            320: {
                items: 1,
            },
        },
    });
});
</script>

<style lang="scss" scoped></style>
