<template>
    <Head title="Register"/>
    <!-- Loader End -->
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
        <div
            class="absolute inset-0 image-wrap z-1 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[600px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <Link href="/"><img src="/assets/images/logo-icon-64.png" class="mx-auto w-24" alt=""></Link>
                    <h5 class="my-6 text-xl font-semibold">Register</h5>
                    <form @submit.prevent="submitForm" class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4 flex space-x-4">
                                <div class="w-1/2">
                                    <label class="font-semibold" for="RegisterName">Name:</label>
                                    <input v-model="form.first_name" id="name" type="text" class="form-input mt-3"
                                           placeholder="Name">
                                    <div v-if="form.errors.first_name" class="text-red-500">{{
                                            form.errors.first_name
                                        }}
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <label class="font-semibold" for="RegisterLastname">Lastname:</label>
                                    <input v-model="form.last_name" id="lastname" type="text" class="form-input mt-3"
                                           placeholder="Lastname">
                                    <div v-if="form.errors.last_name" class="text-red-500">{{
                                            form.errors.last_name
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterPhone">Phone Number:</label>
                                <input v-model="form.phone_number" id="phone" type="text" class="form-input mt-3"
                                       placeholder="+341236524">
                                <div v-if="form.errors.phone_number" class="text-red-500">{{
                                        form.errors.phone_number
                                    }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                <input v-model="form.email" id="email" type="email" class="form-input mt-3"
                                       placeholder="name@example.com">
                                <div v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</div>
                            </div>
                            <div class="mb-4 flex space-x-4">
                                <div class="w-1/2">
                                    <label class="font-semibold" for="LoginPassword">Password:</label>
                                    <input v-model="form.password" id="password" type="password" class="form-input mt-3"
                                           placeholder="Password">
                                    <div v-if="form.errors.password" class="text-red-500">{{
                                            form.errors.password
                                        }}
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <label class="font-semibold" for="password_confirmation">Repeat Password:</label>
                                    <input v-model="form.password_confirmation" id="password_confirmation"
                                           type="password"
                                           class="form-input mt-3" placeholder="Password">
                                    <div v-if="form.errors.password_confirmation" class="text-red-500">{{
                                            form.errors.password_confirmation
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-semibold" for="University">University:</label>
                                <input v-model="form.university" id="university" type="text" class="form-input mt-3"
                                       placeholder="University">
                                <div v-if="form.errors.university" class="text-red-500">{{
                                        form.errors.university
                                    }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="flex items-center mb-0">
                                    <input v-model="form.acceptTnC"
                                           class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-cyan-600 focus:border-cyan-300 focus:ring focus:ring-offset-0 focus:ring-cyan-200 focus:ring-opacity-50 me-2"
                                           type="checkbox" value="" id="AcceptT&C">
                                    <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <a href=""
                                                                                                               class="text-cyan-600">Terms
                                        And Condition</a></label>
                                    <div v-if="form.errors.acceptTnC" class="text-red-500">{{
                                            form.errors.acceptTnC
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                        class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md w-full">
                                    Register
                                </button>
                            </div>
                            <div class="text-center">
                                <span class="text-slate-400 me-2">Already have an account ? </span>
                                <Link :href="route('login')" class="text-black dark:text-white font-bold">Login</Link>
                            </div>
                            <div v-if="successMessage" class="text-cyan-500 text-center">{{ successMessage }}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import {ref} from 'vue';
import axios from 'axios';
import {Link, useForm} from '@inertiajs/vue3';import {Head} from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone_number: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const errors = ref({});
const successMessage = ref('');

const validateForm = () => {
    form.errors.value = {};

    if (!form.value.phone_number.match(/^\d+$/)) {
        form.errors.phone_number = 'Phone number can only contain numbers.';
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!form.value.email.match(emailRegex)) {
        form.errors.email = 'Email is not in the correct format.';
    }

    if (form.value.password.length < 8 || !/[a-zA-Z]/.test(form.value.password) || !/\d/.test(form.value.password)) {
        form.errors.password = 'Password must contain 8 characters, one letter and one number.';
    }

    if (form.value.password !== form.value.password_confirmation) {
        form.errors.password_confirmation = 'Passwords do not match.';
    }

    if (!form.value.acceptTnC) {
        form.errors.acceptTnC = 'You must accept the terms and conditions.';
    }

    return Object.keys(form.errors.value).length === 0;
};

const submitForm = async () => {
    // validateForm();
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
