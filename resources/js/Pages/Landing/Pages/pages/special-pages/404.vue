<template>
    <section class="relative bg-cyan-600/5">
        <div class="container-fluid relative">
            <div class="grid grid-cols-1">
                <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                    <div class="text-center">
                        <Link href="/"><img src="/assets/images/logo-light.png" class="mx-auto h-24" alt=""></Link>
                    </div>
                    <div class="title-heading text-center my-auto">
                        <img src="/assets/images/error.png" class="mx-auto" alt="">
                        <h1 class="mt-3 mb-6 md:text-4xl text-3xl font-bold">Page Not Found?</h1>
                        <p class="text-slate-400">Whoops, this is embarassing. <br> Looks like the page you were looking
                            for wasn't found.</p>

                        <div class="mt-4">
                            <Link href="/"
                                  class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-md">
                                Back
                                to Home
                            </Link>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 text-slate-400">©
                            {{ date }} Hously. Design with <i
                                class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/"
                                                                              target="_blank" class="text-reset">Shreethemes</a>.
                        </p>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';

const date = new Date().getFullYear();
</script>

<style lang="scss" scoped></style>
