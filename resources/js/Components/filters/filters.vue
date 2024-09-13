<template>
    <form class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700"
          @submit.prevent="submit"
    >
        <div class="registration-form text-dark text-start">
            <div class="" :class="props.grids">

                <div>
                    <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span
                        class="text-red-600">*</span></label>
                    <div class="filter-search-form relative filter-border mt-2">
                        <i class="uil uil-search icons"></i>
                        <input name="name" type="text" id="keyword" v-model="form.keyword"
                               class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0 pl-11"
                               placeholder="Search your keywords">
                    </div>
                </div>

                <div>
                    <label for="buy-properties" class="form-label font-medium text-slate-900 dark:text-white">Select
                        Categories:</label>
                    <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                        <i class="uil uil-estate icons"></i>
                        <v-select :options="options" v-model="form.houseType" name="houseType"
                                  class="ms-10"></v-select>
                    </div>
                </div>

                <div>
                    <label for="date_from" class="form-label font-medium text-slate-900 dark:text-white">From:</label>
                    <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                        <i class="uil uil-estate icons"></i>
                        <input type="date" id="date_from" name="date_from" v-model="form.date_from"
                               class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0 pl-11">
                    </div>
                </div>
                <div>
                    <label for="date_from" class="form-label font-medium text-slate-900 dark:text-white">To:</label>
                    <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                        <i class="uil uil-estate icons"></i>
                        <input type="date" id="date_to" name="date_to" v-model="form.date_to"
                               class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0 pl-11">
                    </div>
                </div>

                <div class="mt-4 px-4 col-span-2">

                    <label for="buy-max-price" class="form-label font-medium text-slate-900 dark:text-white ">
                        Price range: </label>
                    <slider-input v-model="form.priceRange"/>
                </div>
                <div class="mt-4">
                    <label for="buy-properties"
                           class="form-label font-medium text-slate-900 dark:text-white">City:</label>
                    <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                        <i class="uil uil-estate icons"></i>
                        <v-select :options="cityOptions" v-model="selectedCity" name="area"
                                  class="ms-10"></v-select>
                    </div>
                </div>
                <div class="mt-4" v-if="selectedCity !== 'Select'">
                    <label for="buy-properties"
                           class="form-label font-medium text-slate-900 dark:text-white">Area:</label>
                    <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                        <i class="uil uil-estate icons"></i>
                        <v-select :options="areaOptions" v-model="selectedArea" name="area"
                                  class="ms-10"></v-select>
                    </div>
                </div>
            </div><!--end grid-->

            <div class="flex justify-between">
                <button class="mt-10 text-cyan-700" @click="showFilters = !showFilters" type="button">
                    More filters <i class="uil uil-angle-down"></i>
                </button>
                <Link :href="route('rent')" class="mt-10" type="button">
                    Reset filters <i class="uil uil-x"></i>
                </Link>
            </div>
            <div v-if="showFilters" class="grid grid-cols-2">
                <div v-for="category in props.specificationCategories" :key="category.id" class="mb-2">
                    <span class="text-lg font-bold">{{ category.name }}</span>
                    <br>
                    <template v-for="specification in category.specifications" :key="specification.id">
                        <input
                            :type="category.is_showcase ? 'radio' : 'checkbox'"
                            class="me-2"
                            :checked="querySpecifications.includes(specification.id.toString())"
                            :name="'specifications_' + category.name"
                            :id="'specifications_' + specification.id"
                            :value="specification.id"
                            @change="updateSpecifications(category.id, specification.id, category.is_showcase)"
                        >
                        <label :for="'specifications_' + specification.id">{{ specification.name }}</label>
                        <br>
                    </template>
                </div>
            </div>
            <div class="">
                <input type="submit" id="search-buy" name="search"
                       class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white searchbtn submit-btn w-full !h-[60px] lg:rounded-none rounded mt-2"
                       value="Search">
            </div>
        </div><!--end container-->
    </form><!--end form-->

    <!-- End Hero -->
</template>

<script setup>
import {ref, defineProps, watch, computed, watchEffect} from 'vue';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import {useForm} from '@inertiajs/vue3';
import SliderInput from '@/Components/SliderInput.vue';
import {Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    grids: {
        type: String,
        required: true,
    },
    specificationCategories: {
        type: Array,
        required: false,
        default: () => [],
    },
    areas: {
        type: Array,
        required: false,
        default: () => [],
    },
    cities: {
        type: Array,
        required: false,
        default: () => [],
    },
});

const areaOptions = ref(['Select']);

const cityOptions = computed(() => {
    return props.cities.map(city => {
        return city.name;
    });
});

const queryParams = new URLSearchParams(window.location.search);

const selectedCity = ref(queryParams.get('city') ?? 'Select');
const selectedArea = ref(queryParams.get('area') ?? 'Select');

watch(selectedCity, (newValue) => {
    var city = props.cities.find(city => city.name === newValue);
    areaOptions.value = props.areas.filter(area => area.city_id === city.id).map(area => area.name);
});

const form = useForm({
    'keyword': queryParams.get('keyword'),
    'houseType': queryParams.get('houseType') ?? 'Select',
    'priceRange': [queryParams.get('priceRange[0]') ?? 0, queryParams.get('priceRange[1]') ?? 100],
    'date_from': queryParams.get('date_from'),
    'date_to': queryParams.get('date_to'),
    'specifications': queryParams.get('specifications') ? JSON.parse(queryParams.get('specifications')) : {},
    'area': ref(selectedArea.value),
    'city': ref(selectedCity.value),
});

const querySpecifications = computed(() => {
    const specificationsValues = [];

    // Iterate over all the parameters in the URL
    queryParams.forEach((value, key) => {
        // Check if the key starts with 'specifications'
        if (key.startsWith('specifications')) {
            specificationsValues.push(value);
        }
    });
    return specificationsValues;
});

const submit = () => {
    form.area = selectedArea.value;
    form.city = selectedCity.value;
    form.get(route('rent'), {
        preserveScroll: true,
    });
};

const options = ref(['Select', 'Rooms', 'Apartments']);
const selected = ref('Houses');

const showFilters = ref(false);

const updateSpecifications = (categoryId, specificationId, isShowcase) => {
    // Ensure the categorySpecs is always an array for checkboxes
    if (!isShowcase) {
        if (!Array.isArray(form.specifications[categoryId])) {
            form.specifications[categoryId] = [];
        }
    }

    if (isShowcase) {
        // For radio buttons, only one value per category
        form.specifications[categoryId] = specificationId;
    } else {
        // For checkboxes, maintain an array of selected values per category
        const categorySpecs = form.specifications[categoryId];

        if (categorySpecs.includes(specificationId)) {
            // Remove if already selected (unchecking)
            form.specifications[categoryId] = categorySpecs.filter(id => id !== specificationId);
        } else {
            // Add new selection
            form.specifications[categoryId].push(specificationId);
        }
    }
};

</script>

<style lang="scss" scoped></style>
