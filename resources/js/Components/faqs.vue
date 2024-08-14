<template>
    <!-- <div class="flex justify-center"> -->
    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
        <div class="lg:col-span-4 md:col-span-5">
            <div class="rounded-md shadow dark:shadow-gray-800 p-6 sticky top-20">
                <ul class="list-none sidebar-nav mb-0 py-0" id="navmenu-nav">
                    <li v-for="category in props.data" class="navbar-item p-0"
                        :class="activeId === category.name ? 'active' : ''">
                        <a :href="'#' + category.name"
                           class="text-base font-medium navbar-link">{{ category.name }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="lg:col-span-8 md:col-span-7 ">
            <div class="scroll-div mb-5" :id="category.name" v-for="category in props.data">
                <h5 class="text-2xl font-semibold">{{ category.name }}</h5>
                <div id="accordion-collapseone" data-accordion="collapse" class="mt-6">
                    <div v-for="item in category.faqs" :key="item"
                         class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden mt-4">
                        <h2 class="text-base font-semibold" id="accordion-collapse-heading-1">
                            <button type="button " @click="isActive = isActive === item.id ? null : item.id"
                                    :class="item.id === isActive ? 'bg-gray-50 dark:bg-slate-800 text-cyan-600' : ''"
                                    class=" flex justify-between items-center p-5 w-full font-medium text-start">
                                <span>{{ item.question }}</span>
                                <svg data-accordion-icon class="size-4  shrink-0"
                                     :class="item.id === isActive ? 'rotate-180' : ''" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="" :class="item.id === isActive ? '' : 'hidden'">
                            <div class="p-5">
                                <p class="text-slate-400 dark:text-gray-400">{{ item.answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!--end grid-->
</template>

<script setup>
import {ref, onMounted} from 'vue';

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const isActive = ref(1);
const activeId = ref('');

onMounted(() => {
    window.addEventListener('scroll', checkVisibleDiv);
});

function checkVisibleDiv() {
    const windowHeight = window.innerHeight;
    const divElements = document.querySelectorAll('.scroll-div');
    divElements.forEach(div => {
        const rect = div.getBoundingClientRect();
        const isVisible = (rect.top >= 0 && rect.bottom <= windowHeight);
        if (isVisible) {
            activeId.value = div.id;
        }
    });
}


</script>

<style lang="scss" scoped></style>
