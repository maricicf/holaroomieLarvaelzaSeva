<template>
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
            <div class="lg:col-span-7 md:col-span-6">
                <img src="../assets/images/svg/contact.svg" alt="">
            </div>

            <div class="lg:col-span-5 md:col-span-6">
                <div class="lg:me-5">
                    <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-700 p-6">
                        <h3 class="mb-6 text-2xl leading-normal font-medium">Get in touch !</h3>

                        <form @submit.prevent="sendForm">
                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                <div class="lg:col-span-6 mb-5">
                                    <label for="name" class="font-medium">Your Name:</label>
                                    <input name="name" id="name" type="text" class="form-input mt-2"
                                           v-model="contactForm.name"
                                           placeholder="Name :">
                                    <span class="text-red-500"
                                          v-if="contactForm.errors.name">
                                        {{ contactForm.errors.name }}
                                    </span>
                                </div>

                                <div class="lg:col-span-6 mb-5">
                                    <label for="email" class="font-medium">Your Email:</label>
                                    <input name="email" id="email" type="email" class="form-input mt-2"
                                           v-model="contactForm.email"
                                           placeholder="Email :">
                                    <span class="text-red-500" v-if="contactForm.errors.email">
                                        {{ contactForm.errors.email }}
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <label for="subject" class="font-medium">Your Question:</label>
                                    <input name="subject" id="subject" class="form-input mt-2" placeholder="Subject :"
                                           v-model="contactForm.subject">

                                    <span class="text-red-500"
                                          v-if="contactForm.errors.subject"> {{ contactForm.errors.subject }}
                                    </span>
                                </div>

                                <div class="mb-5">
                                    <label for="comments" class="font-medium">Your Comment:</label>
                                    <textarea name="comments" id="comments" class="form-input mt-2 textarea"
                                              v-model="contactForm.message"
                                              placeholder="Message :"></textarea>
                                    <span class="text-red-500" v-if="contactForm.errors.message">
                                        {{ contactForm.errors.message }}
                                    </span>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="send"
                                    class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md">Send Message
                            </button>
                            <div v-if="page.props.flash.success">
                                <div class="text-green-600 text-center mt-4">
                                    {{ page.props.flash.success }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->

    <div class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">


            <div v-for="item in datas" :key="item" class="text-center px-6">
                <div class="relative overflow-hidden text-transparent -m-3">
                    <i data-feather="hexagon" class="size-32 fill-cyan-600/5 mx-auto"></i>
                    <div
                        class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-cyan-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                        <i :class="item.icon"></i>
                    </div>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">{{ item.name }}</h5>
                    <p class="text-slate-400 mt-3">{{ item.desc }} <br> {{ item.title2 }}</p>

                    <div class="mt-5">
                        <a :href="item.link"
                           data-type="iframe"
                           class="video-play-icon read-more lightbox btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 transition duration-500">{{
                                item.title
                            }}</a>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</template>

<script setup>

import {useForm, usePage} from '@inertiajs/vue3';

const contactForm = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
    errors: {},
});

const page = usePage();

const sendForm = () => {

    var isValid = true;
    // check if the form is valid
    if (contactForm.name === '') {
        contactForm.errors.name = 'Name is required';
        isValid = false;
    } else {
        contactForm.errors.name = '';
    }

    if (contactForm.email === '') {
        contactForm.errors.email = 'Email is required';
        isValid = false;
    } else {
        contactForm.errors.email = '';
    }

    if (contactForm.subject === '') {
        contactForm.errors.subject = 'Subject is required';
        isValid = false;
    } else {
        contactForm.errors.subject = '';
    }

    if (contactForm.message === '') {
        contactForm.errors.message = 'Message is required';
        isValid = false;
    } else {
        contactForm.errors.message = '';
    }

    // if the form is valid, submit the form
    if (isValid) {
        contactForm.post(route('contact.store'), {
            preserveScroll: true,
            onSuccess: () => {
                contactForm.name = '';
                contactForm.email = '';
                contactForm.subject = '';
                contactForm.message = '';
            },
        });
    }

};

const datas = [
    {
        icon: 'uil uil-phone',
        name: 'Phone',
        desc: 'The phrasal sequence of the is now so that many campaign and benefit',
        title: '+152 534-468-854',
        link: 'tel:+152534-468-854',
    },
    {
        icon: 'uil uil-envelope',
        name: 'Email',
        desc: 'The phrasal sequence of the is now so that many campaign and benefit',
        title: 'contact@example.com',
        link: 'mailto:contact@example.com',
    },
    {
        icon: 'uil uil-map-marker',
        name: 'Location',
        desc: 'C/54 Northwest Freeway, Suite 558,',
        title: 'View on Google map',
        title2: 'Houston, USA 485',
        link: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin',
    },
];

</script>

<style lang="scss" scoped></style>
