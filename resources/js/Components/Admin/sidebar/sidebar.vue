<template>
    <!-- sidebar-wrapper -->
    <nav id="sidebar" class="sidebar-wrapper sidebar-dark">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <Link href="/"><img src="/assets/images/logo-light.png" alt=""></Link>
            </div>

            <ul class="sidebar-menu border-t border-white/10" data-simplebar style="height: calc(100% - 70px);">

                <li :class="activeIndex === item.link ? 'active' : ''" v-for="item in sidebarMenu" :key="item">
                    <Link :href="item.link"><i class="me-2" :class="item.icon"></i>{{ item.title }}</Link>
                </li>

            </ul>
            <!-- sidebar-menu  -->
        </div>
    </nav>
    <!-- sidebar-wrapper  -->
</template>

<script setup>
import {ref, computed, onMounted} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';

const menu = ref(true);
const activeIndex = computed(() => window.location.pathname);
const menuOpen = ref('');

const sidebarMenu = [
    {
        title: 'Dashboard',
        icon: 'mdi mdi-chart-bell-curve-cumulative',
        link: '/admin/dashboard',
    },
    {
        title: 'Properties',
        icon: 'mdi mdi-home-city',
        link: '/admin/properties',
    },
    {
        title: 'Reservations',
        icon: 'mdi mdi-calendar-clock',
        link: '/admin/reservations',
    },
    {
        title: 'Utilities',
        icon: 'mdi mdi-wrench',
        link: '/admin/utilities',
    },
    {
        title: 'Specification Categories',
        icon: 'mdi mdi-format-list-bulleted',
        link: '/admin/specification-categories',
    },
    {
        title: 'Users',
        icon: 'mdi mdi-account-group',
        link: '/admin/users',
    },
    {
        title: 'Blog',
        icon: 'mdi mdi-post-outline',
        link: '/admin/blog',
    },
    {
        title: 'Contact Messages',
        icon: 'mdi mdi-email',
        link: '/admin/messages',
    },
    {
        title: 'Hotspots',
        icon: 'mdi mdi-wifi',
        link: '/admin/hotspot',
    },
    {
        title: 'Areas',
        icon: 'mdi mdi-map-marker',
        link: '/admin/areas',
    },
    {
        title: 'Logout',
        icon: 'mdi mdi-logout',
        link: '/logout',
    },
];

onMounted(() => {
    menuOpen.value = activeIndex.value;
    scrollToTop();
});

function submenu(item) {
    menu.value = !menu.value;
    menuOpen.value = item;
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
}

</script>

<style lang="scss" scoped></style>
