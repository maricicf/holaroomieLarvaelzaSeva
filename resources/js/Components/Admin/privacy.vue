<template>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Privacy Policy</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[16px] font-medium duration-500 dark:text-white/70 hover:text-cyan-600 dark:hover:text-white">
                        <routter-link to="/">Hously</routter-link></li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block capitalize text-[16px] font-medium text-cyan-600 dark:text-white"
                        aria-current="page">Privacy</li>
                </ul>
            </div>

            <div class="container relative mt-6">
                <div class="md:flex justify-center">
                    <div class="lg:w-4/5 w-full">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                            <h5 class="text-lg font-semibold mb-4">Overview :</h5>
                            <p class="text-slate-400">{{ data }}</p>
                            <p class="text-slate-400">In the 1960s, the text suddenly became known beyond the
                                professional circle of typesetters and layout designers when it was used for Letraset
                                sheets (adhesive letters on transparent film, popular until the 1980s) Versions of the
                                text were subsequently included in DTP programmes such as PageMaker etc.</p>
                            <p class="text-slate-400">There is now an abundance of readable dummy texts. These are
                                usually used when a text is required purely to fill a space. These alternatives to the
                                classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical
                                stories.</p>

                            <h5 class="text-lg font-semibold mb-4 mt-6">We use your information to :</h5>
                            <ul class="list-none text-slate-400 mt-4">
                                <li v-for="item in datas" :key="item" class="flex mt-2"><i
                                        class="mdi mdi-arrow-right text-cyan-600 text-lg align-middle me-2"></i>{{ item }}</li>
                            </ul>

                            <h5 class="text-lg font-semibold mb-4 mt-6">Information Provided Voluntarily :</h5>
                            <p class="text-slate-400">{{ info }}</p>

                            <div class="mt-6">
                                <a href=""
                                    class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-md">Print</a>
                            </div>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
            <!-- End Content -->
        </div>
    </div><!--end container-->
</template>

<script setup>
const data = 'It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.'

const datas = ['Digital Marketing Solutions for Tomorrow', 'Our Talented & Experienced Marketing Agency', 'Create your own skin to match your brand', 'Digital Marketing Solutions for Tomorrow', 'Our Talented & Experienced Marketing Agency', 'Create your own skin to match your brand',]

const info = 'In the 1960s, the text suddenly became known beyond the  professional circle of typesetters and layout designers when it was used for Letraset sheets (adhesive letters on transparent film, popular until the 1980s) Versions of the text were subsequently included in DTP programmes such as PageMaker etc.'
</script>

<style lang="scss" scoped></style>
