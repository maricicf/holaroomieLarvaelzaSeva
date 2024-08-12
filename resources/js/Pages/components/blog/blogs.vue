<template>

        <div :class="grids">
            <div v-for="item in datas" :key="item"
                class="group relative h-fit hover:-mt-[5px] overflow-hidden bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700 transition-all duration-500">
                <div class="relative overflow-hidden">
                    <img :src="item.image" class="" alt="">
                    <div class="absolute end-4 top-4">
                        <span
                            class="bg-blue-600 text-white text-[14px] px-2.5 py-1 font-medium rounded-full h-5">{{ item.category }}</span>
                    </div>
                </div>

                <div class="relative p-6">
                    <div class="">
                        <div class="flex justify-between mb-4">
                            <span class="text-slate-400 text-sm"><i
                                    class="uil uil-calendar-alt text-slate-900 dark:text-white me-2"></i>{{ item.date }}</span>
                            <span class="text-slate-400 text-sm ms-3"><i
                                    class="uil uil-clock text-slate-900 dark:text-white me-2"></i>{{ item.time }}</span>
                        </div>

                        <router-link :to="{ name: 'blog-detail', params: { id: item.id } }"
                            class="title text-xl font-medium hover:text-blue-600 duration-500 ease-in-out">{{ item.title }}</router-link>

                        <div class="mt-3">
                            <router-link :to="{ name: 'blog-detail', params: { id: item.id } }"
                                class="btn btn-link hover:text-blue-600 after:bg-blue-600 duration-500 ease-in-out">Read
                                More <i class="uil uil-arrow-right"></i></router-link>
                        </div>
                    </div>
                </div>
            </div>
            <!--end content-->
        </div><!--end grid-->

        <pagination />

</template>

<script setup>
import { ref, defineProps } from 'vue'
import pagination from '@/components/pagination.vue';

defineProps({
    grids:{
        type: String,
        required: true
    }
})
const datas = ref([
    {
        id: 1,
        image: require('../../assets/images/property/1.jpg'),
        category: 'Residential',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Skills That You Can Learn In The Real Estate Market'
    },
    {
        id: 2,
        image: require('../../assets/images/property/2.jpg'),
        category: 'Land',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Learn The Truth About Real Estate Industry'
    },
    {
        id: 3,
        image: require('../../assets/images/property/3.jpg'),
        category: 'Commercial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '10 Quick Tips About Business Development'
    },
    {
        id: 4,
        image: require('../../assets/images/property/4.jpg'),
        category: 'Industrial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '14 Common Misconceptions About Business Development'
    },
    {
        id: 5,
        image: require('../../assets/images/property/5.jpg'),
        category: 'Investment',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '10 Things Your Competitors Can Teach You About Real Estate'
    },
    {
        id: 6,
        image: require('../../assets/images/property/6.jpg'),
        category: 'Residential',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Why We Love Real Estate'
    },
    {
        id: 7,
        image: require('../../assets/images/property/7.jpg'),
        category: 'Land',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '110 Quick Tips About Real Estate'
    },
    {
        id: 8,
        image: require('../../assets/images/property/8.jpg'),
        category: 'Commercial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '15 Best Blogs To Follow About Real Estate'
    },
    {
        id: 9,
        image: require('../../assets/images/property/9.jpg'),
        category: 'Industrial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Using Banner Stands To Increase Trade Show Traffic'
    },
])

</script>


<style lang="scss" scoped></style>
