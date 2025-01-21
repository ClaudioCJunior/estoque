<script setup>
import NavItem from '@/Components/NavItem.vue';

const props = defineProps({
    isSidebarOpen: Boolean,
});

const navItems = [
    {
        href: "dashboard",
        text: 'Dashboard',
        iconClass: 'fas fa-solid fa-house',
    },
    {
        href: 'clientes',
        text: 'Clientes',
        iconClass: 'fas fa-users',
    },
    {
        href: 'clientes',
        text: 'Vendas',
        iconClass: 'fas fa-shopping-cart',
    },
    {
        href: 'clientes',
        text: 'Produtos',
        iconClass: 'fas fa-box',
    },
    {
        href: 'clientes',
        text: 'Investimento',
        iconClass: 'fas fa-chart-line',
    },
    {
        href: 'clientes',
        text: 'Fluxo de Caixa',
        iconClass: 'fas fa-money-bill-wave',
    },
];

const navAccountItems = [
    {
        href: "clientes",
        text: 'Profile',
        iconClass: 'fas fa-user',
    },
    {
        href: 'establishments.index',
        text: 'Estabelecimentos',
        iconClass: 'fas fa-store',
    },
    {
        href: 'clientes',
        text: 'Sair',
        iconClass: 'fas fa-sign-out-alt',
    },
];
</script>

<template>
    <aside :class="['sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps ps--active-y', { 'bg-light': isSidebarOpen }]" id="sidenav-main">
        <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <span class="ms-1 font-weight-bold">Soft Stock</span>
    </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto ps" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <NavItem
            v-for="item in navItems"
            :key="item.text"
            :href="item.href"
            :text="item.text"
            :icon-class="item.iconClass"
        />
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <NavItem
            v-for="item in navAccountItems"
            :key="item.text"
            :href="item.href"
            :text="item.text"
            :icon-class="item.iconClass"
        />
      </ul>
    </div>
</aside>
</template>