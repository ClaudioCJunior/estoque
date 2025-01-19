<template>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <span :class="['mask opacity-10 border-radius-lg', bgClass]"></span>
            <div class="card-body p-3 position-relative">
                <div class="row">
                    <div class="col-8 text-start">
                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                            <i :class="[iconClass, 'text-dark text-gradient text-lg opacity-10']" aria-hidden="true"></i>
                        </div>
                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                            {{ value }}
                        </h5>
                        <span class="text-white text-sm">{{ label }}</span>
                    </div>
                    <div class="col-4 d-flex align-items-end justify-content-end">
                        <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">{{ percentage }}</p>
                    </div>
                </div>
            </div>
        </div>
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
    value: {
        type: Number,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    percentage: {
        type: String,
        required: false
    }
});
</script>