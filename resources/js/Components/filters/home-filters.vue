<template>
    <div id="StarterContent"
         class="p-6 mt-16 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
        <div :class="isActive === 1 ? '' : 'hidden'" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
            <form action="#" @submit.prevent="submit">
                <div class="registration-form text-dark text-start">
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                        <div>
                            <label class="form-label font-medium text-slate-900 dark:text-white">Search :
                                <span class="text-red-600">*</span></label>
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
                            <label for="date_from"
                                   class="form-label font-medium text-slate-900 dark:text-white">From:</label>
                            <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                                <i class="uil uil-estate icons"></i>
                                <input type="date" id="date_from" name="date_from" v-model="form.date_from"
                                       class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0 pl-11">
                            </div>
                        </div>
                        <div>
                            <label for="date_from"
                                   class="form-label font-medium text-slate-900 dark:text-white">To:</label>
                            <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                                <i class="uil uil-estate icons"></i>
                                <input type="date" id="date_to" name="date_to" v-model="form.date_to"
                                       class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0 pl-11">
                            </div>
                        </div>
                        <div class="lg:mt-6">
                            <input type="submit" id="search-buy" name="search"
                                   class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                   value="Search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import {useForm} from '@inertiajs/vue3';

const queryParams = new URLSearchParams(window.location.search);

const form = useForm({
    keyword: queryParams.get('keyword'),
    houseType: queryParams.get('houseType') ?? 'Select',
    date_from: queryParams.get('date_from'),
    date_to: queryParams.get('date_to'),
});

const isActive = ref(1);
const options = ref(['Room', 'Apartment']);
const selected = ref('Room');

const submit = () => {
    form.get(route('rent'), {
        preserveScroll: true,
    });
};

// function toggle(Number) {
//     isActive.value = Number
// }
</script>

<style lang="scss" scoped></style>
