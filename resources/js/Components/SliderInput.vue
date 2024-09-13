<template>

    <Slider
        @change="value => $emit('update:modelValue', value)"
        v-model="sliderValue"
        :min="props.minimum"
        :max="props.maximum"
        tooltipPosition="bottom"
    />
</template>

<script setup>
import Slider from '@vueform/slider';
import {ref, watchEffect} from 'vue';

const props = defineProps({
    modelValue: {
        required: true,
    },
    minimum: {
        type: Number,
        required: false,
        default: 0,
    },
    maximum: {
        type: Number,
        required: false,
        default: 100,
    },
});

const sliderValue = ref(props.modelValue);

const emit = defineEmits(['update:modelValue']);

</script>

<style src="@vueform/slider/themes/default.css">


</style>
