<template>
    <!-- Loader End -->
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
        <div
            class="absolute inset-0 image-wrap z-1 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[600px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <Link href="/"><img src="/assets/images/logo-icon-64.png" class="mx-auto" alt=""></Link>
                    <h5 class="my-6 text-xl font-semibold">Register</h5>
                    <form @submit.prevent="submitForm" class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4 flex space-x-4">
                                <div class="w-1/2">
                                    <label class="font-semibold" for="RegisterName">Name:</label>
                                    <input v-model="form.firstName" id="name" type="text" class="form-input mt-3"
                                           placeholder="Name">
                                    <div v-if="errors.firstName" class="text-red-500">{{ errors.firstName }}</div>
                                </div>
                                <div class="w-1/2">
                                    <label class="font-semibold" for="RegisterLastname">Lastname:</label>
                                    <input v-model="form.lastName" id="lastname" type="text" class="form-input mt-3"
                                           placeholder="Lastname">
                                    <div v-if="errors.lastName" class="text-red-500">{{ errors.lastName }}</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterPhone">Phone Number:</label>
                                <input v-model="form.phoneNumber" id="phone" type="text" class="form-input mt-3"
                                       placeholder="+341236524">
                                <div v-if="errors.phoneNumber" class="text-red-500">{{ errors.phoneNumber }}</div>
                            </div>
                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                <input v-model="form.email" id="email" type="email" class="form-input mt-3"
                                       placeholder="name@example.com">
                                <div v-if="errors.email" class="text-red-500">{{ errors.email }}</div>
                            </div>
                            <div class="mb-4 flex space-x-4">
                                <div class="w-1/2">
                                    <label class="font-semibold" for="LoginPassword">Password:</label>
                                    <input v-model="form.password" id="password" type="password" class="form-input mt-3"
                                           placeholder="Password">
                                    <div v-if="errors.password" class="text-red-500">{{ errors.password }}</div>
                                </div>
                                <div class="w-1/2">
                                    <label class="font-semibold" for="RepeatPassword">Repeat Password:</label>
                                    <input v-model="form.repeatPassword" id="repeatPassword" type="password"
                                           class="form-input mt-3" placeholder="Password">
                                    <div v-if="errors.repeatPassword" class="text-red-500">{{
                                            errors.repeatPassword
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-semibold" for="University">University:</label>
                                <input v-model="form.university" id="university" type="text" class="form-input mt-3"
                                       placeholder="University">
                                <div v-if="errors.university" class="text-red-500">{{ errors.university }}</div>
                            </div>
                            <div class="mb-4">
                                <div class="flex items-center mb-0">
                                    <input v-model="form.acceptTnC"
                                           class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                                           type="checkbox" value="" id="AcceptT&C">
                                    <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <a href=""
                                                                                                               class="text-green-600">Terms
                                        And Condition</a></label>
                                    <div v-if="errors.acceptTnC" class="text-red-500">{{ errors.acceptTnC }}</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">
                                    Register
                                </button>
                            </div>
                            <div class="text-center">
                                <span class="text-slate-400 me-2">Already have an account ? </span>
                                <Link :href="route('login')" class="text-black dark:text-white font-bold">Login</Link>
                            </div>
                            <div v-if="successMessage" class="text-green-500 text-center">{{ successMessage }}</div>
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
import {Link} from '@inertiajs/vue3';

const form = ref({
    firstName: '',
    lastName: '',
    phoneNumber: '',
    email: '',
    password: '',
    repeatPassword: '',
    university: '',
    acceptTnC: false,
});

const errors = ref({});
const successMessage = ref('');

const validateForm = () => {
    errors.value = {};

    if (!form.value.phoneNumber.match(/^\d+$/)) {
        errors.value.phoneNumber = 'Phone number can only contain numbers.';
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!form.value.email.match(emailRegex)) {
        errors.value.email = 'Email is not in the correct format.';
    }

    if (form.value.password.length < 8 || !/[a-zA-Z]/.test(form.value.password) || !/\d/.test(form.value.password)) {
        errors.value.password = 'Password must contain 8 characters, one letter and one number.';
    }

    if (form.value.password !== form.value.repeatPassword) {
        errors.value.repeatPassword = 'Passwords do not match.';
    }

    if (!form.value.acceptTnC) {
        errors.value.acceptTnC = 'You must accept the terms and conditions.';
    }

    return Object.keys(errors.value).length === 0;
};

const submitForm = async () => {
    if (validateForm()) {
        try {
            const response = await axios.post('http://localhost:5299/api/User', {
                email: form.value.email,
                password: form.value.password,
                repeatPassword: form.value.repeatPassword,
                firstName: form.value.firstName,
                lastName: form.value.lastName,
                phoneNumber: form.value.phoneNumber,
                university: form.value.university,
            });
            console.log(response);
            successMessage.value = 'Registration successful!';
        } catch (error) {
            errors.value = {form: 'Registration failed. Please try again.'};
        }
    }
};
</script>
