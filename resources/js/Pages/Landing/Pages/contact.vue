<template>
    <Head title="Contact Us"/>
    <navbar :container="'container'" :navLight="'justify-end'"/>
    <!-- Google Map -->
    <div class="container-fluid relative mt-20">
        <div class="grid grid-cols-1">
            <div class="w-full leading-[0] border-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1539.8777549934648!2d-0.3546163302894453!3d39.47485173342915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6048977630a6b7%3A0xe028f5761e1e3294!2sC%2F%20de%20Polo%20y%20Peyrol%C3%B3n%2C%2044%2C%20El%20Pla%20del%20Real%2C%2046021%20Val%C3%A8ncia!5e0!3m2!1sen!2ses!4v1723472592267!5m2!1sen!2ses"
                    style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
    <!-- Google Map -->
    <section class="relative lg:py-24 py-16">
        <contact/>
    </section>
    <footers/>
</template>

<script setup>
import navbar from '@/Components/navbar/navbar.vue';
import contact from '@/Components/contact.vue';
import switcher from '@/Components/switcher.vue';
import footers from '@/Components/footers/footer.vue';
import {Head} from '@inertiajs/vue3';
</script>

<style lang="scss" scoped>

</style>
