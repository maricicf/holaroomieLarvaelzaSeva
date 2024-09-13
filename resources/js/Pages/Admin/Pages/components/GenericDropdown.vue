<template>
    <div>
        <label :for="props.name" class="block text-sm font-medium text-gray-700">{{ props.label }} <span
            class="text-red-500" v-if="required">*</span> </label>
        <select :name="props.name" :id="props.name" :autocomplete="props.name"
                :value="props.modelValue"
                @change="emit('update:modelValue', $event.target.value)"
                class="mt-1 focus ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option v-for="item in props.items" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <span v-if="props.error" class="text-red-500 text-sm">{{ props.error }}</span>
    </div>
</template>
<script setup>

const props = defineProps({
    modelValue: {
        required: true,
    },
    items: {
        type: Array,
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
    required: {
        type: Boolean,
        required: false,
        default: false,
    },
    error: {
        type: String,
        required: false,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);

</script>

<style scoped lang="scss">

</style>
