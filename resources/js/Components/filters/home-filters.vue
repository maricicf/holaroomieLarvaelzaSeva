<template>
    <div id="StarterContent"
        class="p-6 mt-16 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
        <div :class="isActive === 1 ? '' : 'hidden'" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
            <form action="#">
                <div class="registration-form text-dark text-start">
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                        <div>
                            <label class="form-label font-medium text-slate-900 dark:text-white">Search :
                                <span class="text-red-600">*</span></label>
                            <div class="filter-search-form relative filter-border mt-2">
                                <i class="uil uil-search icons"></i>
                                <input name="name" type="text" id="job-keyword"
                                    class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                    placeholder="Search your keaywords">
                            </div>
                        </div>

                        <div>
                            <label for="buy-properties"
                                class="form-label font-medium text-slate-900 dark:text-white">Select
                                Categories:</label>
                            <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                                <i class="uil uil-estate icons"></i>
                                <v-select :options="options" v-model="selected" class="ms-10"></v-select>
                            </div>
                        </div>

                        <div>
                            <label for="buy-min-price" class="form-label font-medium text-slate-900 dark:text-white">Min
                                Price
                                :</label>
                            <div class="filter-search-form relative filter-border mt-2 bg-gray-50 dark:bg-slate-800">
                                <i class="uil uil-usd-circle icons"></i>
                                <v-select :options="options2" v-model="selected2" class="ms-10"></v-select>
                            </div>
                        </div>

                        <div>
                            <label for="buy-max-price" class="form-label font-medium text-slate-900 dark:text-white">Max
                                Price
                                :</label>
                            <div class="filter-search-form relative mt-2 bg-gray-50 dark:bg-slate-800">
                                <i class="uil uil-usd-circle icons"></i>
                                <v-select :options="options3" v-model="selected3" class="ms-10"></v-select>
                            </div>
                        </div>

                        <div class="lg:mt-6">
                            <input type="submit" id="search-buy" name="search"
                                class="btn bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                value="Search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'

const isActive = ref(1)
const options = ref(['Room', 'Apartment'])
const selected = ref('Room')
const options2 = ref(['Min Price', '300', '400', '500', '600', '700'])
const selected2 = ref('Min Price')
const options3 = ref(['Max Price', '500', '1000', '2000', '3000', '4000', '5000', '6000'])
const selected3 = ref('Max Price')



// function toggle(Number) {
//     isActive.value = Number
// }
</script>

<style lang="scss" scoped></style>
