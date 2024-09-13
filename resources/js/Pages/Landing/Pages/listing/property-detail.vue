<template>
    <Head title="Property Detail"/>
    <div>
        <navbar :container="'container'" :navLight="'justify-end'"/>
        <!-- Start -->
        <section class="relative md:py-24 pt-24 pb-16">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                    <div class="lg:col-span-8 md:col-span-7">
                        <div v-if="props.data?.image" class="grid grid-cols-1 relative">
                            <img :src="'/assets/images/property/single/' + data.image" class="img-fluid rounded"
                                 alt=""/>
                        </div>
                        <div v-else class="grid grid-cols-1 relative">
                            <div class="tiny-one-item">
                                <div v-for="item in props.data.images" :key="item" class="tiny-slide">
                                    <img :src="'/assets/images/property/single/' + item.path"
                                         class="rounded-md shadow dark:shadow-gray-700"
                                         alt="property"/>
                                </div>
                            </div>
                        </div><!--end col-->

                        <h4 class="text-2xl font-medium mt-6 mb-3">{{ props.data.title }}</h4>
                        <span class="text-slate-400 flex items-center"><i data-feather="map-pin"
                                                                          class="size-5 me-2"></i>
                            {{ props.data.area.city.name + ', ' + props.data.area.name }},
                            {{ props.data.address.street }} {{
                                props.data.address.number
                            }}, {{
                                props.data.address.floor
                            }} floor, door {{ props.data.address.door }},
                            {{ props.data.address.zip_code }}
                        </span>


                        <ul class="py-3 flex items-center list-none">
                            <li class="flex items-center lg:me-6 me-4">
                                <i class="uil  lg:text-3xl text-2xl me-2 text-cyan-600 uil-compress-arrows"></i>
                                <span class="lg:text-xl">{{ props.data.size ?? 1 }} m<sup>2</sup></span>
                            </li>
                            <li class="flex items-center lg:me-6 me-4">
                                <i class="uil  lg:text-3xl text-2xl me-2 text-cyan-600 uil-bed-double"></i>
                                <span class="lg:text-xl">
                                    {{ props.data.number_of_beds }}
                                    {{
                                        props.data.number_of_beds > 1
                                            ? ' Beds'
                                            : ' Bed'
                                    }} </span>
                            </li>
                            <li class="flex items-center lg:me-6 me-4">
                                <i class="uil  lg:text-3xl text-2xl me-2 text-cyan-600 uil-bath"></i>
                                <span class="lg:text-xl"> {{ props.data.number_of_baths }} {{
                                        props.data.number_of_baths > 1
                                            ? ' Baths'
                                            : ' Bath'
                                    }} </span>
                            </li>
                        </ul>

                        <div class="py-3 border-b" v-if="props.data.hotspots.length > 0">
                            <h1 class="text-2xl font-bold">
                                Hotspots
                            </h1>
                            <ul>
                                <li v-for="hotspot in props.data.hotspots">
                                    <span class="italic">{{ hotspot.pivot.minutes }} {{
                                            hotspot.pivot.minutes > 1
                                                ? 'minutes'
                                                : 'minute'
                                        }}</span> to {{ hotspot.name }}
                                </li>
                            </ul>
                        </div>

                        <div class="py-3 border-b">
                            <h2 class="text-2xl font-bold">About this place</h2>
                            <p class="text-slate-400">
                                {{ props.data.description }}
                            </p>
                        </div>

                        <div class="border-0 py-3 border-b"
                             v-if="props.data.groupedSpecifications.filter(x => !x.is_showcase).length">
                            <h2 class="text-2xl font-bold">What this place offers</h2>
                            <div class="">
                                <template v-for="feature in props.data.groupedSpecifications"
                                          :key="feature"
                                >
                                    <div class="w-full pt-2 "
                                         v-if="!feature.is_showcase && feature.features.length">
                                        <h1 class="text-xl font-semibold">
                                            <span class="text-cyan-600" v-if="feature.icon"> <i class="uil me-2"
                                                                                                :class="feature.icon"></i></span>
                                            {{ feature.name }} </h1>
                                        <ul>
                                            <li v-for="f in feature.features">
                                                <span class="text-slate-400" v-if="f.icon"> <i class="uil me-2"
                                                                                               :class="f.icon"></i></span>
                                                {{ f.name }}
                                            </li>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="border-0 mt-6" v-if="props.data.rooms.length">
                            <h2 class="text-2xl font-bold">Apartment Rooms</h2>

                            <div class="grid grid-cols-2 grid-flow-col gap-4">
                                <div v-for="room in props.data.rooms" :key="room"
                                     class="w-full rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-md dark:hover:shadow-md dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 m-3">
                                    <div class="relative">
                                        <img :src="'/assets/images/property/single/'+room.images[0].path" alt="Image">
                                    </div>

                                    <div class="p-6">
                                        <div class="pb-6">
                                            <Link :href="route('property-detail',room.id)"
                                                  class="text-lg hover:text-cyan-600 font-medium ease-in-out duration-500">
                                                {{
                                                    room.title
                                                }}
                                            </Link>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full leading-[0] border-0 mt-6">
                            <Map class="w-full h-[400px]"
                                 :display-coords="{latitude: props.data.latitude, longitude: props.data.longitude}"/>
                        </div>


                    </div>

                    <div class="lg:col-span-4 md:col-span-5">
                        <div class="sticky top-20 ">
                            <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700 p-6">
                                <div class="">
                                    <h5 class="text-2xl font-medium">Price:</h5>

                                    <!--                                    <div class="flex justify-between items-center mt-4">-->
                                    <!--                                        <span class="text-xl font-medium">{{ data?.price ? data?.price : '$45' }}</span>-->

                                    <!--                                        <span-->
                                    <!--                                            class="bg-cyan-600/10 text-cyan-600 text-sm px-2.5 py-0.75 rounded h-6">For-->
                                    <!--                                            Sale</span>-->
                                    <!--                                    </div>-->

                                    <ul class="list-none mt-4">
                                        <li class="flex justify-between items-center mb-2"
                                            v-for="price in props.data.prices">
                                            <span class="text-slate-400 text-sm">{{ price.category.name }}</span>
                                            <span class="font-medium text-sm">€ {{ price.price }} </span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex" v-if="page.props.auth.user">
                                    <div class="p-1 w-full">
                                        <button
                                            @click="openModal"
                                            class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md w-full">Book
                                            Now
                                        </button>
                                    </div>
                                </div>


                                <div v-else>
                                    <h1 class="text-center mt-6">
                                        You need to login to book or offer!
                                    </h1>
                                </div>

                                <div v-if="reservationForm.errors">
                                    <div class="text-red-600 text-center mt-4" v-if="reservationForm.errors.start_date">
                                        {{ reservationForm.errors.start_date }}
                                    </div>
                                    <div class="text-red-600 text-center mt-4" v-if="reservationForm.errors.end_date">
                                        {{ reservationForm.errors.end_date }}
                                    </div>
                                    <div class="text-red-600 text-center mt-4"
                                         v-if="reservationForm.errors.property_id">
                                        {{ reservationForm.errors.property_id }}
                                    </div>

                                </div>

                                <div v-if="page.props.flash.success">
                                    <div class="text-green-600 text-center mt-4">
                                        {{ page.props.flash.success }}
                                    </div>
                                </div>

                            </div>
                            <div class="text-center border p-4 mt-4 rounded-xl">
                                <div class="flex justify-between p-3" v-if="prices.months > 0">
                                    <div>€ {{ props.data.prices[2].price }} x {{ Math.floor(daysInBetween / 30) }}
                                        months
                                    </div>
                                    <div>
                                        € {{
                                            props.data.prices[2].price * Math.floor(daysInBetween / 30)
                                        }}
                                    </div>
                                </div>

                                <div class="flex justify-between p-3" v-if="prices.weeks > 0">
                                    <div>€ {{ props.data.prices[1].price }} x {{ Math.floor(daysInBetween % 30 / 7) }}
                                        weeks
                                    </div>
                                    <div>
                                        € {{
                                            props.data.prices[1].price * Math.floor(daysInBetween % 30 / 7)
                                        }}
                                    </div>

                                </div>

                                <div class="flex justify-between p-3" v-if="prices.days > 0">
                                    <div>€ {{ props.data.prices[0].price }} x {{
                                            daysInBetween - Math.floor(daysInBetween / 30) * 30 -
                                            Math.floor(daysInBetween % 30 / 7) * 7
                                        }}
                                        days
                                    </div>
                                    <div>
                                        € {{
                                            props.data.prices[0].price * Math.floor(daysInBetween % 30 % 7)
                                        }}
                                    </div>
                                </div>

                                <hr/>
                                <div class="p-3 flex justify-between font-medium">
                                    <div>Total</div>
                                    <div>
                                        € {{
                                            totalPrice
                                        }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 flex justify-center">
                                <VDatePicker v-model.range="range"
                                             v-if="showDatePicker"
                                             :disabled-dates="disabledDates"
                                             :min-date="new Date(props.data.available_from)"
                                             :max-date="new Date(props.data.available_to)"/>
                            </div>
                            <p class="text-center font-semibold mt-3">Rent for semester or whole academic year: </p>
                            <div class="mt-3 grid grid-cols-2 gap-2">
                                <button class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md"
                                        @click="selectSemester()"
                                >
                                    One semester
                                </button>
                                <button class="btn bg-cyan-600 hover:bg-cyan-700 text-white rounded-md"
                                        @click="selectYear()"
                                >
                                    Academic year
                                </button>
                            </div>
                            <div class="flex justify-center mt-2">
                                <button
                                    class="btn bg-transparent hover:bg-cyan-700 hover:text-white text-cyan-600 border border-cyan-600 rounded-md mx-auto"
                                    v-if="!showDatePicker"
                                    @click="showDatePicker = true"
                                >
                                    Select by date
                                </button>
                            </div>

                            <div class="mt-12 text-center">
                                <h3 class="mb-6 text-xl leading-normal font-medium text-black dark:text-white">Have
                                    Question
                                    ? Get in touch!</h3>

                                <div class="mt-6">
                                    <Link :href="route('contact')"
                                          class="btn bg-transparent hover:bg-cyan-600 border border-cyan-600 text-cyan-600 hover:text-white rounded-md">
                                        <i
                                            class="uil uil-phone align-middle me-2"></i> Contact us
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--end section-->
        <footers/>
    </div>
    <!-- End -->
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
                            class="w-full max-w-lg transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900 text-center"
                            >
                                {{
                                    isPackageShown
                                        ? 'Select a package'
                                        : 'Are you sure you want to book this property ?'
                                }}
                            </DialogTitle>
                            <div class="mt-5" v-if="isPackageShown">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="rounded bg-orange-200 border border-yellow-600 p-2">
                                        <h1 class="text-center font-semibold">Bronze</h1>
                                        <h1 class="text-center font-semibold">199€</h1>
                                        <ul class="text-sm list-disc p-3">
                                            <li>Rent agreement Maintenance</li>
                                            <li>
                                                1 Erasmus Flash trip
                                            </li>
                                            <li>
                                                1 Free Spanish Class
                                            </li>
                                            <li>
                                                1 Free Gym Class
                                            </li>
                                            <li>
                                                Erasmus Membership card
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rounded bg-gray-100 border border-gray-400 p-2">
                                        <h1 class="text-center font-semibold">Silver</h1>
                                        <h1 class="text-center font-semibold">249€</h1>
                                        <ul class="text-sm list-disc p-3">
                                            <li>Rent agreement Maintenance</li>
                                            <li>
                                                1 Erasmus Flash trip
                                            </li>
                                            <li>
                                                1 Free Spanish Class
                                            </li>
                                            <li>
                                                1 Free Gym Class
                                            </li>
                                            <li>
                                                Erasmus Membership card
                                            </li>
                                            <li>
                                                1 bed sheet
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rounded bg-amber-100 border border-amber-300 p-2">
                                        <h1 class="text-center font-semibold">Gold</h1>
                                        <h1 class="text-center font-semibold">299€</h1>
                                        <ul class="text-sm list-disc p-3">
                                            <li>Rent agreement Maintenance</li>
                                            <li>
                                                1 Erasmus Flash trip
                                            </li>
                                            <li>
                                                1 Free Spanish Class
                                            </li>
                                            <li>
                                                1 Free Gym Class
                                            </li>
                                            <li>
                                                Erasmus Membership card
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-2">
                                    <button
                                        @click="isPackageShown = false"
                                        class="btn bg-orange-200 hover:bg-orange-300 text-orange-700 rounded-md mt-3">
                                        Select
                                    </button>
                                    <button class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md mt-3"
                                            @click="isPackageShown = false"
                                    >
                                        Select
                                    </button>
                                    <button class="btn bg-amber-200 hover:bg-amber-300 text-amber-700 rounded-md mt-3"
                                            @click="isPackageShown = false"
                                    >
                                        Select
                                    </button>
                                </div>

                            </div>

                            <p class="text-sm text-center font-bold mt-3" v-if="!isPackageShown">
                                You will be charged €{{ totalPrice }} for {{ daysInBetween }} days.
                            </p>
                            <div class="flex justify-between">
                                <div class="mt-4">
                                    <button
                                        v-if="!isPackageShown"
                                        type="button"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                        @click="bookProperty"
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
import navbar from '@/Components/navbar/navbar.vue';
import {ref, onMounted, computed, watch} from 'vue';
import {tns} from 'tiny-slider/src/tiny-slider';
import {Link, Head} from '@inertiajs/inertia-vue3';
import Map from '@/Components/Map.vue';
import footers from '@/Components/footers/footer.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue';

const isOpen = ref(false);

const isPackageShown = ref(true);

function closeModal() {
    isOpen.value = false;
}

function openModal() {
    isPackageShown.value = true;
    isOpen.value = true;
}

const props = defineProps({
    id: {
        type: String,
        required: true,
    },
    data: {
        type: Object,
        required: true,
    },
});

const range = ref({
    start: new Date(),
    end: new Date(new Date().setDate(new Date().getDate() + 1)),
});

const attributes = ref([
    {
        key: 'today',
        highlight: true,
        dates: new Date(),
    },
]);

const disabledDates = computed(() => {
    let dates = [];

    for (let i = 0; i < props.data.reservations.length; i++) {
        let reservationDate = {
            start: new Date(props.data.reservations[i].start_date),
            end: new Date(props.data.reservations[i].end_date),
        };
        dates.push(reservationDate);
    }

    return dates;
});

const page = usePage();

const loadTinySlider = function() {
    tns({
        container: '.tiny-one-item',
        items: 1,
        controls: true,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: 'bottom',
        controlsText: ['<i class="mdi mdi-chevron-left "></i>', '<i class="mdi mdi-chevron-right"></i>'],
        nav: false,
        speed: 400,
        gutter: 0,
    });
};

onMounted(() => {
    loadTinySlider();
});

const showDatePicker = ref(true);

const reservationForm = useForm({
    property_id: props.data.id,
    start_date: ref(range.value.start),
    end_date: ref(range.value.end),
});

const bookProperty = () => {
    reservationForm.start_date = range.value.start;
    reservationForm.end_date = range.value.end;
    reservationForm.post(route('reservation.store'));
    closeModal();
    window.location.reload();
};

const selectSemester = () => {
    range.value.start = new Date(new Date().getFullYear(), 8, 1);
    range.value.end = new Date(new Date().getFullYear() + 1, 0, 31);
    showDatePicker.value = false;
};

const selectYear = () => {
    range.value.start = new Date(new Date().getFullYear(), 8, 1);
    range.value.end = new Date(new Date().getFullYear() + 1, 5, 31);
    showDatePicker.value = false;
};

const daysInBetween = computed(() => {
    return Math.floor((range.value.end - range.value.start) / (1000 * 60 * 60 * 24));
});

const totalPrice = computed(() => {
    return props.data.prices[2].price * Math.floor(daysInBetween.value / 30) +
        props.data.prices[1].price * Math.floor(daysInBetween.value % 30 / 7) +
        props.data.prices[0].price *
        (daysInBetween.value - Math.floor(daysInBetween.value / 30) * 30 - Math.floor(daysInBetween.value % 30 / 7) *
            7);
});

const prices = ref({
    months: Math.floor(daysInBetween.value / 30),
    weeks: Math.floor(daysInBetween.value % 30 / 7),
    days: daysInBetween.value - Math.floor(daysInBetween.value / 30) * 30 - Math.floor(daysInBetween.value % 30 / 7) *
        7,
});

watch(daysInBetween, (newValue) => {
    prices.value.months = Math.floor(newValue / 30);
    prices.value.weeks = Math.floor(newValue % 30 / 7);
    prices.value.days = newValue - Math.floor(newValue / 30) * 30 - Math.floor(newValue % 30 / 7) * 7;
});


</script>

<style lang="scss" scoped></style>
