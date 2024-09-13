<template>
    <div
        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-md dark:hover:shadow-md dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 m-3">
        <div class="relative">
            <img :src="'assets/images/property/'+item.images[0].path" alt="Image">
        </div>

        <div class="p-6">
            <div class="pb-6">
                <Link :href="route('property-detail',item.id)"
                      class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">{{
                        item.title
                    }}
                </Link>
            </div>


            <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
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

            <ul class="pt-6 flex justify-between items-center list-none">
                <li>
                    <span class="text-slate-400">Price</span>
                    <p class="text-lg font-medium">{{ item.prices[0].price }} euro</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    item: Object,
});

</script>

<style scoped lang="scss">

</style>
