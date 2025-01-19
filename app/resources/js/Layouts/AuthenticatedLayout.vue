<script setup>
import { ref } from 'vue';
import Sidebar from './Sidebar.vue';
import Navbar from './Navbar.vue';

const isSidebarOpen = ref(false);

function toggleSidebar() {
    isSidebarOpen.value = !isSidebarOpen.value;
}</script>

<template>
    <div :class="['g-sidenav-show', { 'g-sidenav-pinned': isSidebarOpen }]">
        <Sidebar :is-sidebar-open="isSidebarOpen"/>


        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-auto">
            <Navbar @toggle-sidebar="toggleSidebar"/>

            <div class="container-fluid py-6">
                <slot />
            </div>
        </main>
    </div>
</template>

<style scoped>
.main-content {
    overflow-y: auto;
}
</style>
