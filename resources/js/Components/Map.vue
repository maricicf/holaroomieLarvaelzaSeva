<template>
    <div id="map" :class="props.class"></div>
</template>

<script setup lang="ts">
import leaflet from "leaflet";
import {computed, onMounted, provide, ref, watchEffect} from "vue";
import {userMarker, nearbyMarkers} from "@/Store/mapStore";
import {useGeolocation} from '@vueuse/core'

const {coords, locatedAt, error, resume, pause} = useGeolocation()

let map: leaflet.Map;
let userGeoMarker: leaflet.Marker;

const props = defineProps({
    pins: {
        type: Array,
        required: false
    },
    class: {
        type: String,
        required: false
    },
    displayCoords: {
        type: Object,
        required: false
    },
    selectMarker: {
        type: Boolean,
        required: false,
        default: false
    },
    modelValue: {
        type: Object,
        required: false
    }
});

const emits = defineEmits(["update:modelValue"]);

onMounted(() => {
    map = leaflet
        .map("map")
        .setView([0, 0], 13);

    leaflet
        .tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution:
                '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        })
        .addTo(map);

    if (props.pins) {
        props.pins.forEach(({latitude, longitude, title, id,image}) => {
            leaflet
                .marker([latitude, longitude])
                .addTo(map)
                .bindPopup(
                    `<a href="/property/${id}">
                                <strong>${title}</strong>
                                <img src="/assets/images/property/single/${image}" class="w-20" alt="image"/>
                            </a>`
                );
        });
    }

    if (props.selectMarker) {

        // Variable to keep track of the currently placed marker
        let currentMarker = null;


        map.addEventListener("click", (e) => {
            const {lat: latitude, lng: longitude} = e.latlng;

            // Remove the existing marker if it exists
            if (currentMarker) {
                map.removeLayer(currentMarker);
            }

            // Create a new marker and add it to the map
            currentMarker = leaflet
                .marker([latitude, longitude])
                .addTo(map)
                .bindPopup(
                    `Saved Marker at (<strong>${latitude.toFixed(2)},${longitude.toFixed(2)}</strong>)`
                )
                .openPopup();

            // Emit the new coordinates to the parent component
            emits("update:modelValue", {latitude, longitude});
        });

    }
});

watchEffect(() => {
    if (
        coords.value.latitude !== Number.POSITIVE_INFINITY &&
        coords.value.longitude !== Number.POSITIVE_INFINITY
    ) {
        userMarker.value.latitude = coords.value.latitude;
        userMarker.value.longitude = coords.value.longitude;

        if (userGeoMarker) {
            map.removeLayer(userGeoMarker);
        }


        if (props.displayCoords) {
            map.setView([props.displayCoords.latitude, props.displayCoords.longitude], 13);
            userGeoMarker = leaflet
                .marker([props.displayCoords.latitude, props.displayCoords.longitude])
                .addTo(map)
                .bindPopup("Property location");
        } else {
            map.setView([userMarker.value.latitude, userMarker.value.longitude], 13);

            userGeoMarker = leaflet
                .marker([userMarker.value.latitude, userMarker.value.longitude])
                .addTo(map)
                .bindPopup("Your location");

        }


        const el = userGeoMarker.getElement();
        if (el) {
            el.style.filter = "hue-rotate(120deg)";
        }
    }
});
</script>
<style scoped lang="scss">
//#map {
//    width: 50%;
//    height: 100vh;
//}
</style>
