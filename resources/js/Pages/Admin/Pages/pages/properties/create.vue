<template>

    <Head title="Properties"/>
    <admin-layout>

        <div class="p-4">
            <h1 class="font-bold text-2xl">
                Create Property
            </h1>
            <form @submit.prevent="submitForm" method="post">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <GenericInput label="Title" name="title" v-model="createPropertyForm.title"
                                  :error="createPropertyForm.errors.title"
                                  type="text"/>
                    <GenericInput label="Description" name="description" v-model="createPropertyForm.description"
                                  :error="createPropertyForm.errors.description"
                                  :is-textarea="true"/>

                    <div class="w-full">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Location</label>
                        <Map class="w-full h-64" :select-marker="true" v-model="coordinates"/>

                    </div>


                    <GenericInput label="Start Date" name="start_date" v-model="createPropertyForm.start_date"
                                  :error="createPropertyForm.errors.start_date"
                                  type="date"/>

                    <GenericInput label="End Date" name="end_date" v-model="createPropertyForm.end_date"
                                  :error="createPropertyForm.errors.end_date"
                                  type="date"/>

                    <GenericInput label="Price Per Day" name="price_per_day"
                                  v-model="createPropertyForm.price.perDay"
                                  :error="createPropertyForm.errors.price_per_day"
                                  type="number"/>
                    <GenericInput label="Price Per Week" name="price_per_week"
                                  v-model="createPropertyForm.price.perWeek"
                                  :error="createPropertyForm.errors.price_per_week"
                                  type="number"/>
                    <GenericInput label="Price Per Month" name="price_per_month"
                                  v-model="createPropertyForm.price.perMonth"
                                  :error="createPropertyForm.errors.price_per_month"
                                  type="number"/>

                    <GenericInput label="Street" name="street" :error="createPropertyForm.errors.street"
                                  v-model="createPropertyForm.address.street"/>

                    <GenericInput label="Door" name="door" :error="createPropertyForm.errors.door"
                                  v-model="createPropertyForm.address.door"/>
                    <GenericInput label="Number" name="number" :error="createPropertyForm.errors.number"
                                  v-model="createPropertyForm.address.number"/>
                    <GenericInput label="Floor" name="floor" :error="createPropertyForm.errors.floor"
                                  v-model="createPropertyForm.address.floor"/>
                    <GenericInput label="ZIP" name="zip" :error="createPropertyForm.errors.zip"
                                  v-model="createPropertyForm.address.zip"/>

                    <GenericInput label="Size" name="size"
                                  v-model="createPropertyForm.size"
                                  :minimum="1"
                                  :error="createPropertyForm.errors.size"
                                  type="number"/>

                    <GenericInput label="Number of Bathrooms" name="number_of_baths"
                                  v-model="createPropertyForm.number_of_baths"
                                  :minimum="1"
                                  :maximum="4"
                                  :error="createPropertyForm.errors.number_of_baths"
                                  type="number"/>

                    <GenericInput label="Number of Beds" name="number_of_beds"
                                  v-model="createPropertyForm.number_of_beds"
                                  :minimum="1"
                                  :maximum="10"
                                  :error="createPropertyForm.errors.number_of_beds"
                                  type="number"/>

                    <GenericDropdown label="City" name="city" :items="props.cities"
                                     :error="createPropertyForm.errors.city"
                                     v-model="createPropertyForm.address.city"/>

                    <div v-if="showAreas != null">
                        <GenericDropdown label="Area" name="area_id" :items="showAreas"
                                         :error="createPropertyForm.errors.area_id"
                                         v-model="createPropertyForm.area_id"/>
                    </div>


                    <div>
                        <label for="specification_category_id" class="block text-sm font-medium text-gray-700">Specification
                            Categories</label>
                        <template v-for="category in props.specificationCategories" :key="category.id">
                            <span class="text-xl">{{ category.name }}</span>
                            <br>
                            <template v-for="specification in category.specifications" :key="specification.id">
                                <input
                                    :type="category.is_showcase ? 'radio' : 'checkbox'"
                                    class="me-2"
                                    :name="'specifications_' + category.name"
                                    :id="'specifications_' + specification.id"
                                    :value="specification.id"
                                    @change="updateSpecifications(category.id, specification.id, category.is_showcase)"
                                >
                                <label :for="'specifications_' + specification.id">{{ specification.name }}</label>
                                <br>
                            </template>
                        </template>
                    </div>

                    <div>
                        <label for="area_id" class="block text-sm font-medium text-gray-700">Hotspots</label>
                        <template v-for="hotspot in props.hotspots" :key="hotspot.id">
                            <input
                                type="checkbox"
                                class="me-2"
                                :name="'hotspot_' + hotspot.name"
                                :id="'hotspot_' + hotspot.id"
                                :value="hotspot.id"
                                @change="updateHotspots(hotspot.id, hotspot.name)"
                            >
                            <label :for="'hotspot_' + hotspot.id">{{ hotspot.name }}</label>
                            <br>
                            <GenericInput :label="'Minutes to ' +  hotspot.name" :name="'minutes_'+hotspot.name"
                                          type="number"
                                          :minimum="0"
                                          v-if="createPropertyForm.hotspots.includes(hotspot.id)"
                                          v-model="createPropertyForm.hotspotData[hotspot.id]"/>
                        </template>
                    </div>


                    <FileInput label="Images" name="images" v-model="createPropertyForm.images" :allow-multiple="true"/>


                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>

    </admin-layout>
</template>
<script setup>

import {Head, useForm} from '@inertiajs/vue3';
import {onMounted, ref, watch} from 'vue';
import AdminLayout from '@/Pages/Admin/Pages/layouts/AdminLayout.vue';
import Map from '@/Components/Map.vue';
import GenericInput from '@/Pages/Admin/Pages/components/GenericInput.vue';
import GenericDropdown from '@/Pages/Admin/Pages/components/GenericDropdown.vue';
import FileInput from '@/Pages/Admin/Pages/components/FileInput.vue';

const props = defineProps({
    specificationCategories: {
        type: Array,
        required: false,
    },
    cities: {
        type: Array,
        required: false,
    },
    hotspots: {
        type: Array,
        required: false,
    },
});

const showAreas = ref(null);

const coordinates = ref({
    latitude: null,
    longitude: null,
});

const createPropertyForm = useForm({
    title: '',
    description: '',
    coordinates: {
        latitude: '',
        longitude: '',
    },
    start_date: '',
    end_date: '',
    price: {
        perDay: '',
        perWeek: '',
        perMonth: '',
    },
    area_id: '',
    address: {
        street: '',
        city: ref(null),
        number: '',
        door: '',
        floor: '',
        zip: '',
    },
    images: [],
    specifications: [],
    hotspots: [],
    size: '',
    number_of_baths: '',
    number_of_beds: '',
    hotspotData: [],
});

const submitForm = () => {
    createPropertyForm.specifications = Object.values(createPropertyForm.specifications).flat();
    createPropertyForm.coordinates.latitude = coordinates.value.latitude;
    createPropertyForm.coordinates.longitude = coordinates.value.longitude;

    if (!validateData()) {
        return;
    }

    createPropertyForm.post(route('admin.properties.store'));
};

const validateData = () => {
    var isValid = true;

    if (createPropertyForm.address.city == null) {
        createPropertyForm.errors.city = 'City is required';
        isValid = false;
    } else {
        createPropertyForm.errors.city = null;
    }

    if (createPropertyForm.area_id === '') {
        createPropertyForm.errors.area_id = 'Area is required';
        isValid = false;
    } else {
        createPropertyForm.errors.area_id = null;
    }

    if (createPropertyForm.images.length === 0) {
        createPropertyForm.errors.images = 'Images are required';
        isValid = false;
    } else {
        createPropertyForm.errors.images = null;
    }

    if (createPropertyForm.specifications.length === 0) {
        createPropertyForm.errors.specifications = 'Specifications are required';
        isValid = false;
    } else {
        createPropertyForm.errors.specifications = null;
    }
    if (createPropertyForm.coordinates.latitude === '' || createPropertyForm.coordinates.longitude === '') {
        createPropertyForm.errors.coordinates = 'Location is required';
        isValid = false;
    } else {
        createPropertyForm.errors.coordinates = null;
    }
    if (createPropertyForm.title === '') {
        createPropertyForm.errors.title = 'Title is required';
        isValid = false;
    } else {
        createPropertyForm.errors.title = null;
    }
    if (createPropertyForm.description === '') {
        createPropertyForm.errors.description = 'Description is required';
        isValid = false;
    } else {
        createPropertyForm.errors.description = null;
    }
    if (createPropertyForm.start_date === '') {
        createPropertyForm.errors.start_date = 'Start Date is required';
        isValid = false;
    } else {
        createPropertyForm.errors.start_date = null;
    }
    if (createPropertyForm.end_date === '') {
        createPropertyForm.errors.end_date = 'End Date is required';
        isValid = false;
    } else {
        createPropertyForm.errors.end_date = null;
    }
    if (createPropertyForm.price.perDay === '') {
        createPropertyForm.errors.price_per_day = 'Price Per Day is required';
        isValid = false;
    } else {
        createPropertyForm.errors.price_per_day = null;
    }
    if (createPropertyForm.price.perWeek === '') {
        createPropertyForm.errors.price_per_week = 'Price Per Week is required';
        isValid = false;
    } else {
        createPropertyForm.errors.price_per_week = null;
    }
    if (createPropertyForm.price.perMonth === '') {
        createPropertyForm.errors.price_per_month = 'Price Per Month is required';
        isValid = false;
    } else {
        createPropertyForm.errors.price_per_month = null;
    }
    if (createPropertyForm.address.street === '') {
        createPropertyForm.errors.street = 'Street is required';
        isValid = false;
    } else {
        createPropertyForm.errors.street = null;
    }
    if (createPropertyForm.address.zip === '') {
        createPropertyForm.errors.zip = 'ZIP is required';
        isValid = false;
    } else {
        createPropertyForm.errors.zip = null;
    }
    if (createPropertyForm.address.number === '') {
        createPropertyForm.errors.number = 'Number is required';
        isValid = false;
    } else {
        createPropertyForm.errors.number = null;
    }
    if (createPropertyForm.address.door === '') {
        createPropertyForm.errors.door = 'Door is required';
        isValid = false;
    } else {
        createPropertyForm.errors.door = null;
    }
    if (createPropertyForm.address.floor === '') {
        createPropertyForm.errors.floor = 'Floor is required';
        isValid = false;
    } else {
        createPropertyForm.errors.floor = null;
    }

    console.log(createPropertyForm.errors, isValid);
    if (isValid) {
        return true;
    }
    return false;

};

const updateHotspots = (hotspotId, hotspotName) => {
    if (createPropertyForm.hotspots.includes(hotspotId)) {
        createPropertyForm.hotspots = createPropertyForm.hotspots.filter(id => id !== hotspotId);
    } else {
        createPropertyForm.hotspots.push(hotspotId);
    }
};

watch(createPropertyForm, (value) => {
    if (value.address.city != '' && value.address.city != null) {
        showAreas.value = props.cities.find(city => city.id == value.address.city).areas;
    }
});

const updateSpecifications = (categoryId, specificationId, isShowcase) => {
    // Ensure the categorySpecs is always an array for checkboxes
    if (!isShowcase) {
        if (!Array.isArray(createPropertyForm.specifications[categoryId])) {
            createPropertyForm.specifications[categoryId] = [];
        }
    }

    if (isShowcase) {
        // For radio buttons, only one value per category
        createPropertyForm.specifications[categoryId] = specificationId;
    } else {
        // For checkboxes, maintain an array of selected values per category
        const categorySpecs = createPropertyForm.specifications[categoryId];

        if (categorySpecs.includes(specificationId)) {
            // Remove if already selected (unchecking)
            createPropertyForm.specifications[categoryId] = categorySpecs.filter(id => id !== specificationId);
        } else {
            // Add new selection
            createPropertyForm.specifications[categoryId].push(specificationId);
        }
    }
};

</script>

<style scoped lang="scss">

</style>
