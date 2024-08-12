<template>
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
        <div
            class="absolute inset-0 image-wrap z-1 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <Link :href="route('home')"><img src="/assets/images/logo-icon-64.png" class="mx-auto" alt="">
                    </Link>
                    <h5 class="my-6 text-xl font-semibold">Login</h5>
                    <form class="text-start" @submit.prevent="submitLoginForm">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-medium" for="email">Email Address:</label>
                                <input id="email" type="email" class="form-input mt-3" v-model="loginForm.email"
                                       placeholder="name@example.com">
                                <div class="text-red-500" v-if="loginForm.errors.email"
                                     v-text="loginForm.errors.email"></div>
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="LoginPassword">Password:</label>
                                <input id="LoginPassword" type="password" class="form-input mt-3"
                                       v-model="loginForm.password"
                                       placeholder="Password">
                                <div class="text-red-500" v-if="loginForm.errors.password"
                                     v-text="loginForm.errors.password"></div>
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="flex items-center mb-0">
                                    <input
                                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-blue-600 focus:border-blue-300 focus:ring focus:ring-offset-0 focus:ring-blue-200 focus:ring-opacity-50 me-2"
                                        type="checkbox" value="" id="RememberMe">
                                    <label class="form-checkbox-label text-slate-400" for="RememberMe">Remember
                                        me</label>
                                </div>
                                <p class="text-slate-400 mb-0">
                                    <Link href="/re-password"
                                          class="text-slate-400">Forgot password ?
                                    </Link>
                                </p>
                            </div>

                            <div class="mb-4">
                                <button type="submit"
                                        class="btn bg-blue-600 hover:bg-blue-700 text-white rounded-md w-full">Login
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Don't have an account ?</span>
                                <Link
                                    :href="route('register')" class="text-black dark:text-white font-bold">Register
                                </Link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->

</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import {useForm} from '@inertiajs/vue3';

const loginForm = useForm({
    email: '',
    password: '',
});

const submitLoginForm = () => {
    console.log(loginForm);
    loginForm.post('/login', {
        preserveScroll: true,
        onSuccess: () => {
            // Do something after the form has been successfully submitted
        },
    });

};

</script>

<style lang="scss" scoped></style>
