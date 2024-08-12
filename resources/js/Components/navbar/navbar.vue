<template>
    <nav id="topnav" class="defaultscroll is-sticky">
        <div class="relative flex justify-between" :class="container">
            <!-- Logo container-->
            <Link v-if="props.logoLight" class="logo" href="/">
                <span class="inline-block dark:hidden">
                    <img src="../../assets/images/logo-dark.png" class="l-dark" height="24" alt="">
                    <img src="../../assets/images/logo-light.png" class="l-light" height="24" alt="">
                </span>
                <img src="../../assets/images/logo-light.png" height="24" class="hidden dark:inline-block" alt="">
            </Link>


            <Link v-else class="logo" href="/">
                <img src="../../assets/images/logo-dark.png" class="inline-block dark:hidden" alt="">
                <img src="../../assets/images/logo-light.png" class="hidden dark:inline-block" alt="">
            </Link>
            <!-- End Logo container-->

            <!-- Start Mobile Toggle -->
            <div class="menu-extras" @click="handler">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" :class="toggle === false ? '' : 'open'">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Mobile Toggle -->

            <div id="navigation" :class="toggle === false ? 'none' : 'block'">
                <!-- Navigation Menu-->
                <ul class="navigation-menu" :class="navLight">

                    <li :class="activeIndex === '/' ? 'active' : ''">
                        <Link :href="route('home')" class="sub-menu-item">Home
                        </Link>
                    </li>

                    <li :class="activeIndex === '/rent' ? 'active' : ''">
                        <Link :href="route('rent')"
                              class="sub-menu-item">Rent
                        </Link>
                    </li>

                    <li class="has-submenu parent-parent-menu-item"
                        :class="['/aboutus', '/packages', '/faqs'].includes(activeIndex) ? 'active' : ''">
                        <Link href="" @click="submenu(openMenu === '/aboutus' ? '' : '/aboutus')">How it works and
                            FAQs
                        </Link>
                        <span class="menu-arrow"></span>
                        <ul class="submenu"
                            :class="['/aboutus', '/packages', '/faqs'].includes(openMenu) ? 'open' : ''">
                            <li :class="activeIndex === '/aboutus' ? 'active' : ''">
                                <Link :href="route('about')"
                                      class="sub-menu-item">About Us
                                </Link>
                            </li>
                            <li :class="activeIndex === '/packages' ? 'active' : ''">
                                <Link :href="route('packages')"
                                      class="sub-menu-item">Packages
                                </Link>
                            </li>
                            <li :class="activeIndex === '/faqs' ? 'active' : ''">
                                <Link :href="route('faqs')"
                                      class="sub-menu-item">FAQs
                                </Link>
                            </li>

                        </ul>
                    </li>

                    <li :class="activeIndex === '/blogs' ? 'active' : ''">
                        <Link :href="route('blog')"
                              class="sub-menu-item"> Blog
                        </Link>
                    </li>


                    <li :class="activeIndex === '/contact' ? 'active' : ''">
                        <Link :href="route('contact')"
                              class="sub-menu-item">Contact
                        </Link>
                    </li>


                </ul><!--end navigation menu-->
            </div><!--end navigation-->
            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="inline mb-0">
                    <Link :href="route('login')"
                          class="btn btn-icon bg-blue-600 hover:bg-blue-700 border-blue-600 dark:border-blue-600 text-white rounded-full">
                        <i
                            data-feather="user" class="size-4 stroke-[3]"></i></Link>
                </li>
                <li class="sm:inline ps-1 mb-0 hidden">
                    <Link :href="route('register')"
                          class="btn bg-blue-600 hover:bg-blue-700 border-blue-600 dark:border-blue-600 text-white rounded-full">
                        Register
                    </Link>
                </li>
            </ul>
            <!--Login button End-->

        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->
</template>

<script setup>

import {Link} from '@inertiajs/vue3';
import {ref, onMounted, onUnmounted, defineProps, computed} from 'vue';
import feather from 'feather-icons';

const menu = ref(true);
const current = ref('');
const toggle = ref(false);
const activeIndex = computed(() => window.location.pathname);
const openMenu = ref('');

const props = defineProps({
    logoLight: {
        type: Boolean,
        required: false,
    },
    navLight: {
        type: String,
        required: false,
    },
    container: {
        type: String,
        required: true,
    },
});

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('scroll', onscroll);
    scrollToTop();
    feather.replace();

});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
    window.removeEventListener('scroll', onscroll);
});

function handler() {
    toggle.value = !toggle.value;
}

function submenu(item) {
    menu.value = !menu.value;
    openMenu.value = item;
}

function handleScroll() {
    const navbar = document.getElementById('topnav');
    if (window.scrollY >= 50) {
        navbar.classList.add('nav-sticky');
    } else {
        navbar.classList.remove('nav-sticky');
    }
}

function onscroll() {
    const sections = document.querySelectorAll('section');
    const navItems = document.querySelectorAll('nav.container.collapse ul li');
    let currentSectionId = ''; // Define a variable to store the current section's id
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        if (window.pageYOffset >= sectionTop - 60) {
            currentSectionId = section.getAttribute('id');
        }
    });
    navItems.forEach((li) => {
        if (li.classList.contains(currentSectionId)) {
            li.classList.add('active');
        } else {
            li.classList.remove('active');
        }
    });
    current.value = currentSectionId; // Update the current ref
}

function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}


</script>

<style lang="scss" scoped></style>
