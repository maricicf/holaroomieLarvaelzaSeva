<template>
    <Head title="Reservations"/>
    <admin-layout>
        <Link :href="route('admin.reservations')">
            <button class="bg-blue-500 text-white px-4 mx-4 py-2 rounded-lg mt-4">Back</button>
        </Link>
        <h1 class="text-2xl m-4 font-bold">Edit reservation</h1>
        <span v-if="page.props.flash.success" class="text-green-500">
            {{ page.props.flash.success }}
        </span>

        <form @submit.prevent="submitForm" class="px-5">
            <GenericDropdown label="Status of reservations" name="status" :items="statusOptions"
                             v-model="form.is_payed"/>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg mt-4">Save</button>
        </form>
    </admin-layout>
</template>

<script setup>
import {Head, useForm, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import GenericDropdown from '@/Pages/Admin/Pages/components/GenericDropdown.vue';
import {Link} from '@inertiajs/inertia-vue3';

const page = usePage();

const props = defineProps({
    reservation: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    is_payed: props.reservation.payment_date ? 1 : 0,
});

const statusOptions = [
    {id: 1, name: 'Payed'},
    {id: 0, name: 'Not payed'},
];

const submitForm = () => {
    form.put(route('admin.reservations.update', props.reservation.id));

};

</script>

<style scoped lang="scss">

</style>
