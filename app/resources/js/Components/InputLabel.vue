<template>
    <label :for="htmlFor" class="form-control-label">{{ value }}</label>
</template>

<script setup>
const props = defineProps({
    value: String,
    htmlFor: String,
});
</script>