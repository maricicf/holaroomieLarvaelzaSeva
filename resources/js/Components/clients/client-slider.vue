<template>

        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What Our Client Say ?
            </h3>

            <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                any agent or commisions.</p>
        </div><!--end grid-->

        <div class="flex justify-center relative mt-8">
            <div class="relative w-full">
                <div class="tiny-three-item">
                    <div v-for="item in datas" :key="item" class="tiny-slide">
                        <div class="text-center mx-3">
                            <p class="text-lg text-slate-400 italic"> {{item.title}} </p>

                            <div class="text-center mt-5">
                                <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                    <li v-for="star in item.star" :key="star" class="inline me-1"><i :class="star"></i></li>
                                </ul>

                                <img :src="item.image"
                                    class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 fw-semibold">{{item.name}}</h6>
                                <span class="text-slate-400 text-sm">{{item.position}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end grid-->

</template>

<script setup>
import { ref, onMounted, } from 'vue';
import { tns } from 'tiny-slider/src/tiny-slider';
const datas = ref([
    {
        name: 'Christa Smith',
        position: 'Manager',
        image: 'assets/images/client/01.jpg',
        title: '" Hously made the processes so easy. Hously instantly increased the amount of interest and ultimately saved us over $10,000. "',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        name: 'Christa Smith',
        position: 'Manager',
        image: 'assets/images/client/02.jpg',
        title: '" I highly recommend Hously as the new way to sell your home "by owner". My home sold in 24 hours for the asking price. Best $400 you could spend to sell your home. "',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        name: 'Christa Smith',
        position: 'Manager',
        image: 'assets/images/client/03.jpg',
        title: '" My favorite part about selling my home myself was that we got to meet and get to know the people personally. This made it so much more enjoyable! "',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        name: 'Christa Smith',
        position: 'Manager',
        image: 'assets/images/client/04.jpg',
        title: '" Great experience all around! Easy to use and efficient. "',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        name: 'Christa Smith',
        position: 'Manager',
        image: 'assets/images/client/05.jpg',
        title: '" Hously made selling my home easy and stress free. They went above and beyond what is expected. "',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
    {
        name: 'Christa Smith',
        position: 'Manager',
        image: 'assets/images/client/06.jpg',
        title: '" Hously is fair priced, quick to respond, and easy to use. I highly recommend their services! "',
        star: ['mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star', 'mdi mdi-star']
    },
])

onMounted(() => {
    tns({
        container: '.tiny-three-item',
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 12,
        responsive: {
            992: {
                items: 3
            },

            767: {
                items: 2
            },

            320: {
                items: 1
            },
        },
    });
});
</script>

<style lang="scss" scoped></style>
