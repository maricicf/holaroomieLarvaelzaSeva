<template>
    <!-- Start -->

    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="p-6 rounded-md bg-cyan-600/10">
                <div class="md:flex items-center">
                    <img :src="'/assets/images/users/' + props.user.profile_picture"
                         class="rounded-full size-28" alt="">

                    <div class="md:ms-4 md:mt-0 mt-4 md:flex justify-between items-end">
                        <div>
                            <h5 class="text-2xl font-medium">{{
                                    props.user.first_name + ' ' + props.user.last_name
                                }}
                            </h5>

                            <ul class="list-none mt-2 md:flex items-center md:divide-x-[1px] divide-slate-400">

                                <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2"><i
                                    data-feather="phone" class="size-4 align-middle text-cyan-600 me-2"></i>
                                    {{ props.user.phone_number }}
                                </li>
                                <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2"><i
                                    data-feather="mail" class="size-4 align-middle text-cyan-600 me-2"></i>
                                    {{ props.user.email }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container relative mt-6">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">

            <div class="lg:col-span-12 md:col-span-12    order-1 md:order-2">
                <h5 class="text-xl font-medium">About me</h5>

                <p class="text-slate-400 mt-3">Obviously I'M Property Broker. Property Broker with over 3 years of
                    experience. Experienced with all stages of the agent or broker cycle for dynamic properties. The as
                    opposed to using 'Content here, content here', making it look like readable English.</p>
                <p class="text-slate-400 mt-3">Data Structures and Algorithms are the heart of programming. Initially
                    most of the developers do not realize its importance but when you will start your career in software
                    development, you will find your code is either taking too much time or taking too much space.</p>

                <h5 class="text-xl font-medium mt-6">My Listings</h5>

                <div class="grid grid-cols-1  gap-4">
                    <div v-for="reservation in props.user.reservations" :key="reservation"
                         class="w-full rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-md dark:hover:shadow-md dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 m-3 flex">

                        <img v-if="reservation.property.images.length"
                             :src="'/assets/images/property/'+reservation.property.images[0].path" alt="Image"
                             class="w-1/4">

                        <div class="p-3">
                            {{ reservation.property.title }}

                            <div class="">
                                <p class="text-slate text-sm">{{
                                        new Date(reservation.start_date).toLocaleDateString('en-UK', options)
                                    }} - {{

                                        new Date(reservation.end_date).toLocaleDateString('en-UK', options)
                                    }}
                                </p>
                                <p>€{{ reservation.total_price }}</p>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="md:flex justify-center text-center mt-6">
                    <div class="md:w-full">
                        <Link href="/grid"
                              class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 transition duration-500">
                            View
                            More Properties <i class="uil uil-arrow-right ms-1"></i></Link>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end grid-->
    </div><!--end container-->
    <!-- End -->
</template>

<script setup>
import {ref, onMounted} from 'vue';
import featureds from '@/Components/featured-properties/featured-properties.vue';
import {Link} from '@inertiajs/inertia-vue3';
import {usePage} from '@inertiajs/vue3';

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

const id = ref('');
const data = ref('');
const options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
const page = usePage();

onMounted(() => {
    console.log(props.user);
});

</script>

<style lang="scss" scoped></style>
