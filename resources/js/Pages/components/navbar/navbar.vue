<template>
    <nav id="topnav" class="defaultscroll is-sticky">
        <div class="relative" :class="container">
            <!-- Logo container-->
            <router-link v-if="props.logoLight" class="logo" to="/">
                <span class="inline-block dark:hidden">
                    <img src="../../assets/images/logo-dark.png" class="l-dark" height="24" alt="">
                    <img src="../../assets/images/logo-light.png" class="l-light" height="24" alt="">
                </span>
                <img src="../../assets/images/logo-light.png" height="24" class="hidden dark:inline-block" alt="">
            </router-link>


            <router-link v-else class="logo" to="/">
                <img src="../../assets/images/logo-dark.png" class="inline-block dark:hidden" alt="">
                <img src="../../assets/images/logo-light.png" class="hidden dark:inline-block" alt="">
            </router-link>
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

            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="inline mb-0">
                    <router-link to="/auth-login"
                        class="btn btn-icon bg-blue-600 hover:bg-blue-700 border-blue-600 dark:border-blue-600 text-white rounded-full"><i
                            data-feather="user" class="size-4 stroke-[3]"></i></router-link>
                </li>
                <li class="sm:inline ps-1 mb-0 hidden">
                    <router-link to="/auth-register"
                        class="btn bg-blue-600 hover:bg-blue-700 border-blue-600 dark:border-blue-600 text-white rounded-full">Register</router-link>
                </li>
            </ul>
            <!--Login button End-->

            <div id="navigation" :class="toggle === false ? 'none' : 'block'">
                <!-- Navigation Menu-->
                <ul class="navigation-menu" :class="navLight">

                    <li :class="activeIndex === '/' ? 'active' : ''"><router-link to="/" class="sub-menu-item">Home
                        </router-link>
                    </li>

                    <li :class="activeIndex === '/rent' ? 'active' : ''"><router-link to="/rent"
                            class="sub-menu-item">Rent</router-link></li>

                    <li class="has-submenu parent-parent-menu-item"
                        :class="['/aboutus', '/packages', '/faqs'].includes(activeIndex) ? 'active' : ''">
                        <router-link to="" @click="submenu(openMenu === '/aboutus' ? '' : '/aboutus')">How it works and
                            FAQs</router-link><span class="menu-arrow"></span>
                        <ul class="submenu"
                            :class="['/aboutus', '/packages', '/faqs'].includes(openMenu) ? 'open' : ''">
                            <li :class="activeIndex === '/aboutus' ? 'active' : ''"><router-link to="/aboutus"
                                    class="sub-menu-item">About Us</router-link></li>
                            <li :class="activeIndex === '/packages' ? 'active' : ''"><router-link to="/packages"
                                    class="sub-menu-item">Packages</router-link></li>
                            <li :class="activeIndex === '/faqs' ? 'active' : ''"><router-link to="/faqs"
                                    class="sub-menu-item">FAQs</router-link></li>

                        </ul>
                    </li>

                    <li :class="activeIndex === '/blogs' ? 'active' : ''"><router-link to="/blogs"
                            class="sub-menu-item"> Blog</router-link></li>


                    <li :class="activeIndex === '/contact' ? 'active' : ''"><router-link to="/contact"
                            class="sub-menu-item">Contact</router-link></li>






                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->
</template>

<script setup>
import { ref, onMounted, onUnmounted, defineProps, computed, } from 'vue';
import feather from 'feather-icons'
const menu = ref(true);
const current = ref('');
const toggle = ref(false);
const activeIndex = computed(() => window.location.pathname);
const openMenu = ref('');

const props = defineProps({
    logoLight: {
        type: Boolean,
        required: true
    },
    navLight: {
        type: String,
        required: true
    },
    container: {
        type: String,
        required: true
    }
})

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('scroll', onscroll);
    scrollToTop()
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
    const navbar = document.getElementById("topnav");
    if (window.scrollY >= 50) {
        navbar.classList.add("nav-sticky");
    } else {
        navbar.classList.remove("nav-sticky");
    }
}

function onscroll() {
    const sections = document.querySelectorAll("section");
    const navItems = document.querySelectorAll("nav.container.collapse ul li");
    let currentSectionId = ''; // Define a variable to store the current section's id
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        if (window.pageYOffset >= sectionTop - 60) {
            currentSectionId = section.getAttribute("id");
        }
    });
    navItems.forEach((li) => {
        if (li.classList.contains(currentSectionId)) {
            li.classList.add("active");
        } else {
            li.classList.remove("active");
        }
    });
    current.value = currentSectionId; // Update the current ref
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}

</script>

<style lang="scss" scoped></style>
