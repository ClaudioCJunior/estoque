<template>
    <li class="nav-item">
        <a :class="['nav-link', { active: isActive }]" :href="route(href)">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i :class="[iconClass, isActive ? 'text-white' : 'text-black']"></i>
            </div>
            <span class="nav-link-text ms-1">{{ text }}</span>
        </a>
    </li>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    text: String,
    iconClass: String,
});

const page = usePage();
const isActive = computed(() => {
    const url = page.url.split('?')[0];
    const href = props.href.split('.')[0];
console.log(url, href);

    return url.includes(href);
});
</script>

<style scoped>
.text-white {
    color: white !important;
}

.text-black {
    color: black !important;
}
</style>