<template>
    <div>
        <label :for="props.name" class="block text-sm font-medium text-gray-700">{{ props.label }} <span
            class="text-red-500" v-if="required">*</span> </label>
        <textarea v-if="props.isTextarea" :name="props.name" :id="props.name" :autocomplete="props.name"
                  :value="props.modelValue"
                  @change="emitChange"
                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>

        <input :type="props.type" :name="props.name" :id="props.name" :autocomplete="props.name" v-else
               :value="props.modelValue"
               :min="props.minimum"
               :max="props.maximum"
               @change="emitChange"
               class="mt-1 focus ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

        <div v-if="props.error" class="text-red-500 text-xs mt-1">{{ props.error }}</div>
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
    type: {
        type: String,
        required: false,
        default: 'text',
    },
    isTextarea: {
        type: Boolean,
        required: false,
        default: false,
    },
    error: {
        type: String,
        required: false,
        default: null,
    },
    required: {
        type: Boolean,
        required: false,
        default: false,
    },
    minimum: {
        type: Number,
        required: false,
        default: null,
    },
    maximum: {
        type: Number,
        required: false,
        default: null,
    },
});

const emit = defineEmits(['update:modelValue']);

const emitChange = (event) => {
    emit('update:modelValue', event.target.value);
};
</script>

<style scoped lang="scss">

</style>
