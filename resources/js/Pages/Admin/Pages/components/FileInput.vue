<template>

    <div>
        <label :for="props.name" class="block text-sm font-medium text-gray-700">{{ props.label }}</label>
        <input type="file" :name="props.name" :id="props.name" :accept="props.allowTypes.join(', ')"
               :multiple="allowMultiple"
               :value="props.modelValue"
               @change="emitChange"
               class="mt-1 focus ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <span v-if="props.error" class="text-red-500">{{ props.error }}</span>
    </div>
</template>
<script setup>
const props = defineProps({
    modelValue: {
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    allowMultiple: {
        type: Boolean,
        required: false,
        default: false,
    },
    allowTypes: {
        type: Array,
        required: false,
        default: () => ['image/png', 'image/jpeg', 'image/jpg'],
    },
    error: {
        type: String,
        required: false,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);

const emitChange = (event) => {
    // check data type

    emit('update:modelValue', Array.from(event.target.files));
};
</script>

<style scoped lang="scss">

</style>
