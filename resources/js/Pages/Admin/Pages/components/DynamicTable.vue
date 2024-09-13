<template>
    <div class="flex-auto block py-8 pt-6 px-9">
        <Link :href="route(createRoute)" v-if="props.createRoute">
            <button class="bg-green-600 text-white py-2 px-4 rounded-md mb-5">Add new</button>
        </Link>

        <div class="overflow-x-auto">
            <table class="w-full my-0 align-middle text-dark border  rounded">
                <thead class="align-bottom ">
                <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                    <th class="p-2 text-center min-w-[175px] border-r " v-if="props.deleteRoute">Delete</th>
                    <th class="p-2 text-center min-w-[175px] border-r " v-if="props.editRoute">Edit</th>

                    <th class="p-2 text-center min-w-[175px] border-r " v-for="header in tableHeaders"
                        :key="header">{{
                            header
                        }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b last:border-b-0 p-2" v-for="(property,id) in props.data"
                    :class="id % 2 === 0 ? 'bg-neutral-100 hover:bg-neutral-300' : 'bg-neutral-200 hover:bg-neutral-300'"
                    :key="property.id">
                    <td class="pr-0 flex justify-center border-r " v-if="deleteRoute">
                        <button @click="openAndGetId(property.id)"
                                class="text-white px-4 py-2 rounded-lg bg-red-500 text-center">
                            Delete
                        </button>
                    </td>
                    <td class="pr-0 flex justify-center border-r " v-if="editRoute">
                        <Link :href="route(editRoute, {id: property.id})"
                              class="text-white px-4 py-2 rounded-lg bg-blue-500 text-center">
                            Edit
                        </Link>
                    </td>
                    <td class="pr-0 text-center border-r " v-for="row in tableHeaders">
                        <template v-if="configuration && Object.keys(configuration).includes(row)">

                            <img :src="'/assets/images/'+ props.imageRoot + property[row]" class="h-20 mx-auto"
                                 alt="property image"
                                 v-if="configuration[row] === 'image'">
                            <span class="font-semibold" v-else-if="configuration[row] === 'boolean'">{{
                                    property[row] ? 'Yes' : 'No'
                                }}</span>
                            <span class="text-cyan-600"
                                  v-else-if="configuration[row] === 'icon' && property[row]"> <i class="uil me-2"
                                                                                                 :class="property[row]"></i></span>
                            <span v-else-if="configuration[row] === 'payment' && property[row]" class="font-semibold">
                                <span class="bg-green-500 text-white p-4"> Payed </span>
                            </span>
                            <span v-else-if="configuration[row] === 'payment' && !property[row]" class="font-semibold">
                                <span class="bg-red-500 text-white p-4">Not payed yet!</span>
                            </span>
                            <span v-else-if="configuration[row] === 'payment_date' && property[row]"
                                  class="font-semibold">
                                <span class="">{{
                                        property[row]
                                    }}</span>
                            </span>
                            <span v-else-if="configuration[row] === 'payment_date' && !property[row]"
                                  class="font-semibold">
                                <span class="text-red-500 ">N/A</span>
                            </span>
                            <span class="font-semibold  text-md/normal" v-else>N/A</span>
                        </template>
                        <span class="font-semibold  text-md/normal" v-else>
                                <template v-if="row === 'created_at' || row === 'updated_at'">
                                    {{ new Date(property[row]).toLocaleString() }}
                                </template>
                                <template v-else>
                                {{
                                        computedValue(property[row])
                                    }}
                                </template>
                            </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/25"/>
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Delete Property
                            </DialogTitle>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete this property? This action cannot be undone.
                                </p>
                            </div>

                            <div class="flex justify-between">
                                <div class="mt-4">
                                    <button
                                        type="button"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                        @click="deleteAction"
                                    >
                                        Confirm
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <button
                                        type="button"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-red-100 px-4 py-2 text-sm font-medium text-red-900 hover:bg-red-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                        @click="closeModal"
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>


</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import {defineProps, computed, ref, onMounted} from 'vue';
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue';
import {useForm} from '@inertiajs/vue3';

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    createRoute: {
        type: String,
        required: false,
    },
    deleteRoute: {
        type: String,
        required: false,
    },
    editRoute: {
        type: String,
        required: false,
    },
    tableConfiguration: {
        type: Object,
        required: false,
    },
    imageRoot: {
        type: String,
        required: false,
        default: '',
    },
    configuration: {
        type: Object,
        required: false,
    },
});

const tableHeaders = computed(() => {
    return props.data.map(property => {
        return Object.keys(property);
    })[0];
});

const computedValue = (value) => {

    if (value === null) {
        return 'N/A';
    }
    if (typeof value === 'boolean') {
        return value ? 'Yes' : 'No';
    }

    if (typeof value === 'object') {
        return value.name;
    }

    if (typeof value === 'string' && value.length > 50) {
        return value.substring(0, 50) + '...';
    }

    return value;
};

const isOpen = ref(false);

function closeModal() {
    isOpen.value = false;
}

const deleteForm = useForm({
    id: ref(null),
});

function openAndGetId(id) {
    isOpen.value = true;
    deleteForm.id = id;
}

function deleteAction() {
    deleteForm.delete(route(props.deleteRoute, {id: deleteForm.id}), {
        onSuccess: () => {
            closeModal();
        },
    });
}
</script>


<style scoped lang="scss">

</style>
