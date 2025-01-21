<template>
    <button :disabled="disabled" class="btn bg-gradient-primary" type="submit">
        <slot />
    </button>
</template>

<script setup>
const props = defineProps({
    disabled: Boolean,
});
</script>