<template>
    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white mb-3">
                    {{
                        props.data.title
                    }}</h3>

                <ul class="list-none mt-6">
                    <li class="inline-block text-white/50 mx-5"><span class="text-white block">Date :</span> <span
                        class="block">{{
                            new Date(props.data.created_at).toDateString()
                        }}</span></li>
                </ul>
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

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-1 md:grid-cols-1 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-8 md:order-1 order-2">
                    <div class="relative overflow-hidden rounded-xl shadow dark:shadow-gray-800">

                        <img :src="'/assets/images/blogs/' + props.data.image" alt="blog image">

                        <div class="p-6" v-html="props.data.content">

                        </div>
                    </div>

                    <!-- <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
                        <h5 class="text-lg font-semibold">Leave A Comment:</h5>

                        <form class="mt-8">
                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="name" class="font-semibold">Your Name:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="size-5 absolute top-3 start-4"></i>
                                            <input name="name" id="name" type="text" class="form-input ps-11"
                                                placeholder="Name :">
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="email" class="font-semibold">Your Email:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-5 absolute top-3 start-4"></i>
                                            <input name="email" id="email" type="email" class="form-input ps-11"
                                                placeholder="Email :">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <div class="text-start">
                                        <label for="comments" class="font-semibold">Your Comment:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="message-circle" class="size-5 absolute top-3 start-4"></i>
                                            <textarea name="comments" id="comments" class="form-input ps-11 h-28"
                                                placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="send"
                                class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-md w-full">Send
                                Message</button>
                        </form>
                    </div> -->
                </div><!--end col-->

            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</template>

<script setup>
import {ref, onMounted} from 'vue';

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const id = ref('');
const data = ref('');

const datas = ref([
    {
        id: 1,
        image: 'assets/images/property/1.jpg',
        category: 'Residential',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Skills That You Can Learn In The Real Estate Market',
    },
    {
        id: 2,
        image: 'assets/images/property/2.jpg',
        category: 'Land',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Learn The Truth About Real Estate Industry',
    },
    {
        id: 3,
        image: 'assets/images/property/3.jpg',
        category: 'Commercial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '10 Quick Tips About Business Development',
    },
    {
        id: 4,
        image: 'assets/images/property/4.jpg',
        category: 'Industrial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '14 Common Misconceptions About Business Development',
    },
    {
        id: 5,
        image: 'assets/images/property/5.jpg',
        category: 'Investment',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '10 Things Your Competitors Can Teach You About Real Estate',
    },
    {
        id: 6,
        image: 'assets/images/property/6.jpg',
        category: 'Residential',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Why We Love Real Estate',
    },
    {
        id: 7,
        image: 'assets/images/property/7.jpg',
        category: 'Land',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '110 Quick Tips About Real Estate',
    },
    {
        id: 8,
        image: 'assets/images/property/8.jpg',
        category: 'Commercial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: '15 Best Blogs To Follow About Real Estate',
    },
    {
        id: 9,
        image: 'assets/images/property/9.jpg',
        category: 'Industrial',
        date: '3rd March, 2023',
        time: '5 min read',
        title: 'Using Banner Stands To Increase Trade Show Traffic',
    },
]);

</script>

<style lang="scss" scoped></style>
