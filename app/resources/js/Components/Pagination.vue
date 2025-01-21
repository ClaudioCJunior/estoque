<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm pagination-info">
            <li class="page-item" :class="{ 'disabled': !links[0].url }">
                <inertia-link class="page-link" :href="links[0].url" aria-label="Previous">
                    <i class="fa fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                </inertia-link>
            </li>
            <li v-for="link in links.slice(1, -1)" :key="link.label" :class="['page-item', { 'active': link.active }]">
                <inertia-link class="page-link" :href="link.url" v-html="link.label"></inertia-link>
            </li>
            <li class="page-item" :class="{ 'disabled': !links[links.length - 1].url }">
                <inertia-link class="page-link" :href="links[links.length - 1].url" aria-label="Next">
                    <i class="fa fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                </inertia-link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
const props = defineProps({
    links: Array,
});
</script>