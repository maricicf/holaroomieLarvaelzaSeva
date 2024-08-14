<template>
    <!-- Switcher -->
    <!-- Switcher -->
    <div class="fixed top-1/4 -left-2 z-3">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" @change="changeMode($event)"/>
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
            </label>
        </span>
    </div>
    <!-- Switcher -->

    <!-- LTR & RTL Mode Code -->
    <!-- <div  class="fixed top-[40%] -left-3 z-50">
        <a  id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden cursor-pointer"
                @click="changeThem($event)">LTR</span>
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden cursor-pointer"
                @click="changeThem($event)">RTL</span>
        </a>
    </div> -->
    <!-- LTR & RTL Mode Code -->

    <div v-if="back" class="fixed bottom-3 end-3 z-10">
        <Link href="/" class="back-button btn btn-icon bg-cyan-600 hover:bg-cyan-700 text-white rounded-full"><i
            data-feather="arrow-left" class="size-4"></i></Link>
    </div>


    <!-- Back to top -->
    <a v-else @click="scrollToTop" v-show="showTopButton" id="back-to-top"
       class="fixed text-lg cursor-pointer rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-cyan-600 text-white leading-9"><i
        class="uil uil-arrow-up"></i></a>
    <!-- Back to top -->
    <!-- Back to top -->


</template>

<script setup>
import {Link} from '@inertiajs/vue3';
import { defineProps } from 'vue';
import feather from 'feather-icons';
import {onMounted, onUnmounted} from 'vue';

const props = defineProps({
    back: {
        type: Boolean,
        required: true,
        default: false,
    },
});

const htmlTag = document.getElementsByTagName('html')[0];
const showTopButton = false;
onMounted(() => {
    feather.replace();
});

const created = () => window.addEventListener('scroll', this.handleScroll);

onUnmounted(() => {
    window.removeEventListener('scroll', this.handleScroll);
});

const handleScroll = function() {
    if (
        document.body.scrollTop >= 400 ||
        document.documentElement.scrollTop >= 400
    ) {
        this.showTopButton = true;
    } else {
        this.showTopButton = false;
    }
};
const changeThem = function(event) {
    if (event.target.innerText === 'LTR') {
        this.htmlTag.dir = 'ltr';
    } else {
        this.htmlTag.dir = 'rtl';
    }

};

const changeMode = function() {
    if (this.htmlTag.className.includes('dark')) {
        this.htmlTag.className = 'light';
    } else {
        this.htmlTag.className = 'dark';
    }
};

const scrollToTop = function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
};


</script>

<style lang="scss" scoped></style>
