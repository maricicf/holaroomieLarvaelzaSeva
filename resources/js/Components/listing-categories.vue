<template>
    <div v-if="props.categories" class="container relative">
        <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 md:gap-[30px] gap-3">
            <div v-for="item in datas" :key="item"
                class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <img :src="item.image" alt="">
                <div class="p-4">
                    <a href="" class="text-xl font-medium hover:text-cyan-600">{{ item.name }}</a>
                    <p class="text-slate-400 text-sm mt-1">{{ item.listing }}</p>
                </div>
            </div><!--end content-->
        </div><!--end grid-->
    </div><!--end container-->

    <div v-else class="container relative">
        <div class="grid grid-cols-1 pb-8">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Listing Categories</h3>

            <p class="text-slate-400 max-w-xl">A great plateform to buy, sell and rent your properties without any agent
                or commisions.</p>
        </div><!--end grid-->

        <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 mt-8 md:gap-[30px] gap-3">
            <div v-for="item in datas" :key="item"
                class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <img :src="item.image" alt="">
                <div class="p-4">
                    <a href="" class="text-xl font-medium hover:text-cyan-600">{{ item.name }}</a>
                    <p class="text-slate-400 text-sm mt-1">{{ item.listing }}</p>
                </div>
            </div><!--end content-->
        </div><!--end grid-->
    </div><!--end container-->
</template>

<script setup>
import { ref, defineProps } from 'vue';

const props = defineProps({
    categories:{
        type: Boolean,
        required: true
    }
})

const datas = ref([
    {
        image: require('../assets/images/property/residential.jpg'),
        name: 'Residential',
        listing: '46 Listings'
    },
    {
        image: require('../assets/images/property/land.jpg'),
        name: 'Land',
        listing: '124 Listings'
    },
    {
        image: require('../assets/images/property/commercial.jpg'),
        name: 'Commercial',
        listing: '265 Listings'
    },
    {
        image: require('../assets/images/property/industrial.jpg'),
        name: 'Industrial',
        listing: '452 Listings'
    },
    {
        image: require('../assets/images/property/investment.jpg'),
        name: 'Investment',
        listing: '12 Listings'
    },
])
</script>

<style lang="scss" scoped></style>
