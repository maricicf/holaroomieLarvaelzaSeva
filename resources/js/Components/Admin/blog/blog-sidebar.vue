<template>
    <form>
        <div>
            <label for="searchname" class="font-medium text-lg">Search Properties</label>
            <div class="relative mt-2">
                <i class="mdi mdi-magnify text-lg absolute top-[6px] start-3"></i>
                <input name="search" id="searchname" type="text"
                    class="form-input border border-slate-100 dark:border-slate-800 ps-10" placeholder="Search">
            </div>
        </div>
    </form>

    <h5 class="font-medium text-lg mt-[30px]">Recent post</h5>
    <div v-for="item in datas" :key="item" class="flex items-center mt-4">
        <img :src="item.image" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

        <div class="ms-3">
            <a href="" class="font-medium hover:text-cyan-600">{{ item.title }}</a>
            <p class="text-sm text-slate-400">{{ item.date }}</p>
        </div>
    </div>

    <h5 class="font-medium text-lg mt-[30px]">Social sites</h5>
    <ul class="list-none mt-4">
        <li v-for="item in social" :key="item" class="inline me-1"><a href=""
                class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-cyan-600 hover:text-white hover:bg-cyan-600"><i
                    :data-feather="item" class="h-4 w-4"></i></a></li>
    </ul><!--end icon-->
</template>

<script setup>
import { ref } from 'vue'

const datas = ref([
    {
        image: require('../../assets/images/property/6.jpg'),
        title: '10 Things You About Real Estate',
        date: '2nd March 2023'
    },
    {
        image: require('../../assets/images/property/7.jpg'),
        title: 'Why We Love Real Estate',
        date: '2nd March 2023'
    },
    {
        image: require('../../assets/images/property/8.jpg'),
        title: '110 Quick Tips About Real Estate',
        date: '2nd March 2023'
    },
])

const social = ref(['facebook', 'instagram', 'twitter', 'linkedin', 'github', 'youtube', 'gitlab'])

</script>

<style lang="scss" scoped></style>
