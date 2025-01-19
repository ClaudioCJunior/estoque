<template>
    <div class="col-3 py-3 ps-0">
        <div class="d-flex mb-2">
            <div :class="['icon icon-shape icon-xxs shadow border-radius-sm text-center me-2 d-flex align-items-end justify-content-center', bgClass]">
                <i :class="iconClass"></i>
            </div>
            <p class="text-xs mt-1 mb-0 font-weight-bold">{{ label }}</p>
        </div>
        <h4 class="font-weight-bolder">{{ value }}</h4>
    </div>
</template>

<script setup>
const props = defineProps({
    bgClass: {
        type: String,
        required: true
    },
    iconClass: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    value: {
        type: Number,
        required: true
    }
});
</script>