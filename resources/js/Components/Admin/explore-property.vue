<template>
    <div v-if="props.property" class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Favorite Properties</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[16px] font-medium duration-500 dark:text-white/70 hover:text-cyan-600 dark:hover:text-white">
                        <router-link to="/">Hously</router-link>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="mdi mdi-chevron-right"></i>
                    </li>
                    <li class="inline-block capitalize text-[16px] font-medium text-cyan-600 dark:text-white"
                        aria-current="page">Properties</li>
                </ul>
            </div>

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-6">
                <div v-for="item in datas" :key="item"
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-full mx-auto">
                    <div class="md:flex">
                        <div class="relative md:shrink-0">
                            <img class="h-full w-full object-cover md:w-48" :src="item.image" alt="">
                            <div class="absolute top-4 end-4">
                                <a href="javascript:void(0)"
                                    class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                                        class="mdi mdi-heart text-[20px]"></i></a>
                            </div>
                        </div>
                        <div class="p-6 w-full">
                            <div class="md:pb-4 pb-6">
                                <router-link :to="{name: 'property-detail', params: {id: item.id}}"
                                    class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">{{
        item.name }}</router-link>
                            </div>

                            <ul
                                class="md:py-4 py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                <li class="flex items-center me-4">
                                    <i class="mdi mdi-arrow-expand-all text-2xl me-2 text-cyan-600"></i>
                                    <span>{{ item.sqf }}</span>
                                </li>

                                <li class="flex items-center me-4">
                                    <i class="mdi mdi-bed text-2xl me-2 text-cyan-600"></i>
                                    <span>{{ item.beds }}</span>
                                </li>

                                <li class="flex items-center">
                                    <i class="mdi mdi-shower text-2xl me-2 text-cyan-600"></i>
                                    <span>{{ item.baths }}</span>
                                </li>
                            </ul>

                            <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                                <li>
                                    <span class="text-slate-400">Price</span>
                                    <p class="text-lg font-medium">{{ item.price }}</p>
                                </li>

                                <li>
                                    <span class="text-slate-400">Rating</span>
                                    <ul class="text-lg font-medium text-amber-400 list-none">
                                        <li v-for="star in item.star" :key="star" class="inline me-1"><i
                                                :class="star"></i>
                                        </li>
                                        <li class="inline text-black dark:text-white">{{ item.rating }}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div><!--en grid-->
            <pagination />
            <!-- End Content -->
        </div>
    </div><!--end container-->


    <div v-else-if="propertys" class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-6">
        <div v-for="item in datas.slice(0,6)" :key="item"
            class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
            <div class="relative">
                <img :src="item.image" alt="">

                <div class="absolute top-4 end-4">
                    <a href="javascript:void(0)"
                        class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                            class="mdi mdi-heart text-[20px]"></i></a>
                </div>
            </div>

            <div class="p-6">
                <div class="pb-6">
                    <router-link :to="{name: 'property-detail', params: {id: item.id}}"
                        class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">{{ item.name
                        }}</router-link>
                </div>

                <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                    <li class="flex items-center me-4">
                        <i class="mdi mdi-arrow-expand-all text-2xl me-2 text-cyan-600"></i>
                        <span>{{ item.sqf }}</span>
                    </li>

                    <li class="flex items-center me-4">
                        <i class="mdi mdi-bed text-2xl me-2 text-cyan-600"></i>
                        <span>{{ item.beds }}</span>
                    </li>

                    <li class="flex items-center">
                        <i class="mdi mdi-shower text-2xl me-2 text-cyan-600"></i>
                        <span>{{ item.baths }}</span>
                    </li>
                </ul>

                <ul class="pt-6 flex justify-between items-center list-none">
                    <li>
                        <span class="text-slate-400">Price</span>
                        <p class="text-lg font-medium">{{ item.price }}</p>
                    </li>

                    <li>
                        <span class="text-slate-400">Rating</span>
                        <ul class="text-lg font-medium text-amber-400 list-none">
                            <li v-for="star in item.star" :key="star" class="inline me-1"><i :class="star"></i>
                            </li>
                            <li class="inline text-black dark:text-white">{{ item.rating }}</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!--end property content-->

    </div>


    <div v-else class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Explore Properties</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[16px] font-medium duration-500 dark:text-white/70 hover:text-cyan-600 dark:hover:text-white">
                        <router-link to="/">Hously</router-link>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="mdi mdi-chevron-right"></i>
                    </li>
                    <li class="inline-block capitalize text-[16px] font-medium text-cyan-600 dark:text-white"
                        aria-current="page">Properties</li>
                </ul>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-6">
                <div v-for="item in datas" :key="item"
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="relative">
                        <img :src="item.image" alt="">

                        <div class="absolute top-4 end-4">
                            <a href="javascript:void(0)"
                                class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                                    class="mdi mdi-heart text-[20px]"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <router-link :to="{name: 'property-detail', params: {id: item.id}}"
                                class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">{{ item.name
                                }}</router-link>
                        </div>

                        <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                            <li class="flex items-center me-4">
                                <i class="mdi mdi-arrow-expand-all text-2xl me-2 text-cyan-600"></i>
                                <span>{{ item.sqf }}</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="mdi mdi-bed text-2xl me-2 text-cyan-600"></i>
                                <span>{{ item.beds }}</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mdi mdi-shower text-2xl me-2 text-cyan-600"></i>
                                <span>{{ item.baths }}</span>
                            </li>
                        </ul>

                        <ul class="pt-6 flex justify-between items-center list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">{{ item.price }}</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium text-amber-400 list-none">
                                    <li v-for="star in item.star" :key="star" class="inline me-1"><i :class="star"></i>
                                    </li>
                                    <li class="inline text-black dark:text-white">{{ item.rating }}</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!--end property content-->
            </div><!--en grid-->
            <pagination />
            <!-- End Content -->
        </div>
    </div><!--end container-->
</template>

<script setup>
import { ref, defineProps } from 'vue';
import pagination from '@/components/pagination.vue'

const props = defineProps({
    property: {
        type: Boolean,
        required: true
    },
    propertys: {
        type: Boolean,
        required: true
    },
})
const datas = ref([
    {
        id: 1,
        image: require('../assets/images/property/1.jpg'),
        name: '10765 Hillshire Ave, Baton Rouge, LA 70810, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 2,
        image: require('../assets/images/property/2.jpg'),
        name: '59345 STONEWALL DR, Plaquemine, LA 70764, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 3,
        image: require('../assets/images/property/3.jpg'),
        name: '3723 SANDBAR DR, Addis, LA 70710, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 4,
        image: require('../assets/images/property/4.jpg'),
        name: 'Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 5,
        image: require('../assets/images/property/5.jpg'),
        name: '710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 6,
        image: require('../assets/images/property/6.jpg'),
        name: '5133 MCLAIN WAY, Baton Rouge, LA 70809, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 7,
        image: require('../assets/images/property/7.jpg'),
        name: '2141 Fiero Street, Baton Rouge, LA 70808',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 8,
        image: require('../assets/images/property/8.jpg'),
        name: '9714 Inniswold Estates Ave, Baton Rouge, LA 70809',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 9,
        image: require('../assets/images/property/9.jpg'),
        name: '1433 Beckenham Dr, Baton Rouge, LA 70808, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 10,
        image: require('../assets/images/property/10.jpg'),
        name: '1574 Sharlo Ave, Baton Rouge, LA 70820, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 11,
        image: require('../assets/images/property/11.jpg'),
        name: '2528 BOCAGE LAKE DR, Baton Rouge, LA 70809, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        id: 12,
        image: require('../assets/images/property/12.jpg'),
        name: '1533 NICHOLSON DR, Baton Rouge, LA 70802, USA',
        sqf: '8000sqf',
        beds: '4 Beds',
        baths: '4 Baths',
        price: '$5000',
        rating: '5.0(30)',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
])
</script>

<style lang="scss" scoped></style>
