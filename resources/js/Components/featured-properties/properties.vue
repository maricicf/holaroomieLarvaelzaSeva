<template>
    <div v-if="propertie" class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] mt-8">
        <div v-for="item in props.properties" :key="item"
             class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-full mx-auto">
            <div class="md:flex">
                <div class="relative md:shrink-0">
                    <img v-if="item.images.length > 0" class="h-full w-full object-cover md:w-48"
                         :src="item.images[0].path ?? 'test.png'"
                         alt="">
                    <!-- <div class="absolute top-4 end-4">
                        <a href="javascript:void(0)"
                            class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                                class="mdi mdi-heart text-[20px]"> </i></a>
                    </div> -->
                </div>
                <div class="p-6 w-full">
                    <div class="md:pb-4 pb-6">
                        <Link :href="route('property-detail',item.id)"
                              class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">{{
                                item.name
                            }}
                        </Link>
                    </div>

                    <ul class="md:py-4 py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                        <li class="flex items-center me-4">
                            <i class="uil uil-compress-arrows text-2xl me-2 text-cyan-600"></i>
                            <span>{{ item.sqf }}</span>
                        </li>

                        <li class="flex items-center me-4">
                            <i class="uil uil-bed-double text-2xl me-2 text-cyan-600"></i>
                            <span>{{ item.beds }}</span>
                        </li>

                        <li class="flex items-center">
                            <i class="uil uil-bath text-2xl me-2 text-cyan-600"></i>
                            <span>{{ item.baths }}</span>
                        </li>
                    </ul>

                    <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                        <li>
                            <span class="text-slate-400">Price</span>
                            <p class="text-lg font-medium">{{ item.price }}</p>
                        </li>
                        <!--
                        <li>
                            <span class="text-slate-400">Rating</span>
                            <ul class="text-lg font-medium text-amber-400 list-none">
                                <li v-for="star in item.star" :key="star" class="inline me-1"><i :class="star"></i>
                                </li>
                                <li class="inline text-black dark:text-white">{{ item.rating }}</li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div><!--en grid-->

    <div v-if="moreview" class="md:flex justify-center text-center mt-6">
        <div class="md:w-full">
            <Link to="/list"
                  class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 transition duration-500">View
                More Properties <i class="uil uil-arrow-right ms-1"></i></Link>
        </div>
    </div>


    <div v-else :class="grids">
        <div v-for="item in props.properties" :key="item" v-if="props.properties.length"
             class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-full mx-auto">
            <div class="md:flex">
                <div class="relative md:shrink-0">
                    <img class="h-full w-full object-cover" :class="width" v-if="item.images.length > 0"
                         :src="'assets/images/property/single/'+item.images[0].path ?? 'test.png'" alt="">
                </div>
                <div class="p-6 w-full">
                    <div class="md:pb-4 pb-6">
                        <Link :href="route('property-detail',item.id)"
                              class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">{{
                                item.title
                            }}
                        </Link>
                    </div>

                    <ul class="md:py-4 py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                        <template v-for="specification in item.specifications">
                            <li class="flex items-center me-4"
                                v-if="specification.category.is_showcase"
                            >
                                <i class="uil text-2xl me-2 text-cyan-600"
                                   :class="specification.category.icon"></i>
                                <span class="lg:text-xl">{{ specification.name }}{{
                                        specification.category.name == 'Size' ? 'm2' : ''
                                    }}</span>
                            </li>
                        </template>
                    </ul>

                    <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                        <li>
                            <span class="text-slate-400">Price</span>
                            <p class="text-lg font-medium">€{{ item.prices[0].price }}</p>
                        </li>

                        <!-- <li>
                            <span class="text-slate-400">Rating</span>
                            <ul class="text-lg font-medium text-amber-400 list-none">
                                <li v-for="star in item.star" :key="star" class="inline me-1"><i :class="star"></i>
                                </li>
                                <li class="inline text-black dark:text-white">{{ item.rating }}</li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div v-else>
            <h2 class="text-center text-2xl mt-10">No properties in this momment...</h2>
        </div>

    </div><!--en grid-->

</template>

<script setup>
import {ref, defineProps, onMounted} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    properties: {
        type: Array,
        required: true,
    },
    moreview: {
        type: Boolean,
        required: false,
    },
    propertie: {
        type: Boolean,
        required: false,
    },
    grids: {
        type: String,
        required: false,
    },
    width: {
        type: String,
        required: false,
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
    {
        id: 7,
        image: 'assets/images/property/7.jpg',
        name: '2141 Fiero Street, Baton Rouge, LA 70808',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 8,
        image: 'assets/images/property/8.jpg',
        name: '9714 Inniswold Estates Ave, Baton Rouge, LA 70809',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 9,
        image: 'assets/images/property/9.jpg',
        name: '1433 Beckenham Dr, Baton Rouge, LA 70808, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 10,
        image: 'assets/images/property/10.jpg',
        name: '1574 Sharlo Ave, Baton Rouge, LA 70820, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 11,
        image: 'assets/images/property/11.jpg',
        name: '2528 BOCAGE LAKE DR, Baton Rouge, LA 70809, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
    {
        id: 12,
        image: 'assets/images/property/12.jpg',
        name: '1533 NICHOLSON DR, Baton Rouge, LA 70802, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star'],
    },
]);
</script>

<style lang="scss" scoped></style>
