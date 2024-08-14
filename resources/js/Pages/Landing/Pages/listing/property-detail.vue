<template>
    <Head title="Property Detail"/>
    <div>
        <navbar :container="'container'" :navLight="'justify-end'"/>
        <!-- Start -->
        <section class="relative md:py-24 pt-24 pb-16">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                    <div class="lg:col-span-8 md:col-span-7">
                        <div v-if="props.data?.image" class="grid grid-cols-1 relative">
                            <img :src="'/assets/images/property/single/' + data.image" class="img-fluid rounded"
                                 alt=""/>
                        </div>
                        <div v-else class="grid grid-cols-1 relative">
                            <div class="tiny-one-item">
                                <div v-for="item in props.data.images" :key="item" class="tiny-slide">
                                    <img :src="'/assets/images/property/single/' + item.path"
                                         class="rounded-md shadow dark:shadow-gray-700"
                                         alt="property"/>
                                </div>
                            </div>
                        </div><!--end col-->

                        <h4 class="text-2xl font-medium mt-6 mb-3">{{ props.data.title }}</h4>
                        <span class="text-slate-400 flex items-center"><i data-feather="map-pin"
                                                                          class="size-5 me-2"></i>
                            {{ props.data.area.city.name + ', ' + props.data.area.name }},
                            {{ props.data.address.street }} {{
                                props.data.address.number
                            }}, {{
                                props.data.address.floor
                            }} floor, door {{ props.data.address.door }},
                            {{ props.data.address.zip_code }}
                        </span>


                        <ul class="py-6 flex items-center list-none">
                            <template v-for="specification in props.data.specifications">
                                <li class="flex items-center lg:me-6 me-4"
                                    v-if="specification.category.is_showcase"
                                >
                                    <i class="uil  lg:text-3xl text-2xl me-2 text-cyan-600"
                                       :class="specification.category.icon"></i>
                                    <span class="lg:text-xl">{{ specification.name }}{{
                                            specification.category.name == 'Size' ? 'm2' : ''
                                        }}</span>
                                </li>
                            </template>
                        </ul>

                        <p class="text-slate-400">
                            {{ props.data.description }}
                        </p>

                        <div class="w-full leading-[0] border-0 mt-6">
                            <iframe
                                :src="'https://maps.google.com/maps?q='+ props.data.latitude +','+props.data.longitude +'&hl=es&z=14&amp;output=embed'"
                                style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="lg:col-span-4 md:col-span-5">
                        <div class="sticky top-20">
                            <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700">
                                <div class="p-6">
                                    <h5 class="text-2xl font-medium">Price:</h5>

                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-xl font-medium">{{ data?.price ? data?.price : '$45' }}</span>

                                        <span
                                            class="bg-cyan-600/10 text-cyan-600 text-sm px-2.5 py-0.75 rounded h-6">For
                                            Sale</span>
                                    </div>

                                    <ul class="list-none mt-4">
                                        <li class="flex justify-between items-center mb-2"
                                            v-for="price in props.data.prices">
                                            <span class="text-slate-400 text-sm">{{ price.category.name }}</span>
                                            <span class="font-medium text-sm">{{ price.price }} euro</span>
                                        </li>

                                        <!--                                        <li class="flex justify-between items-center mt-2">-->
                                        <!--                                            <span class="text-slate-400 text-sm">Price per sq ft</span>-->
                                        <!--                                            <span class="font-medium text-sm">$ 186</span>-->
                                        <!--                                        </li>-->

                                        <!--                                        <li class="flex justify-between items-center mt-2">-->
                                        <!--                                            <span class="text-slate-400 text-sm">Monthly Payment (estimate)</span>-->
                                        <!--                                            <span class="font-medium text-sm">$ 1497/Monthly</span>-->
                                        <!--                                        </li>-->
                                    </ul>
                                </div>

                                <div class="flex">
                                    <div class="p-1 w-1/2">
                                        <a href=""
                                           class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md w-full">Book
                                            Now</a>
                                    </div>
                                    <div class="p-1 w-1/2">
                                        <a href=""
                                           class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md w-full">Offer
                                            Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-12 text-center">
                                <h3 class="mb-6 text-xl leading-normal font-medium text-black dark:text-white">Have
                                    Question
                                    ? Get in touch!</h3>

                                <div class="mt-6">
                                    <Link :href="route('contact')"
                                          class="btn bg-transparent hover:bg-cyan-600 border border-cyan-600 text-cyan-600 hover:text-white rounded-md">
                                        <i
                                            class="uil uil-phone align-middle me-2"></i> Contact us
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--end section-->
        <footers/>
    </div>
    <!-- End -->
</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import {ref, onMounted} from 'vue';
import {tns} from 'tiny-slider/src/tiny-slider';
import {Link, Head} from '@inertiajs/inertia-vue3';
import Footer from '@/Components/footers/footer.vue';
import footers from '@/Components/footers/footer.vue';

const props = defineProps({
    id: {
        type: String,
        required: true,
    },
    data: {
        type: Object,
        required: true,
    },
});

const id = ref('');
const data = ref('');
const images = [
    '/assets/images/property/single/1.jpg',
    '/assets/images/property/single/1.jpg',
    '/assets/images/property/single/2.jpg',
    '/assets/images/property/single/3.jpg',
    '/assets/images/property/single/4.jpg',
    '/assets/images/property/single/5.jpg',
];
onMounted(() => {
    console.log(props.data);
    tns({
        container: '.tiny-one-item',
        items: 1,
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
    });
});

</script>

<style lang="scss" scoped></style>
