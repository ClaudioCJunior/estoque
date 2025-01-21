<template>
    <span class="font-weight-bold">{{ name }}</span>
</template>

<script setup>
const props = defineProps({
    name: String,
});
</script>