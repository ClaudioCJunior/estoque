<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const emit = defineEmits(['toggle-sidebar']);

function toggleSidebar() {
    emit('toggle-sidebar');
}

const userName = ref('');
const selectedEstablishment = ref(null);


onMounted(() => {
  fetchUserName();
  fetchUserEstablishments();
});

const fetchUserName = async () => {
  try {
    const response = await fetch('/auth');
    const data = await response.json();
    userName.value = data.name;
  } catch (error) {
    console.error('Erro ao buscar o nome do usuário:', error);
  }
};

const fetchUserEstablishments = async () => {
  try {
    const response = await fetch('/api/user/establishments');
    const data = await response.json();
    establishments.value = data;
  } catch (error) {
    console.error('Erro ao buscar os estabelecimentos do usuário:', error);
  }
};
</script>

<template>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3 d-flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ userName }}</li>
          </ol>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              {{ selectedEstablishment ? selectedEstablishment.name : 'Select Establishment' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li v-for="establishment in establishments" :key="establishment.id">
                <a class="dropdown-item" href="#" @click="selectEstablishment(establishment)">{{ establishment.name }}</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center">
              <a class="btn bg-gradient-success btn-sm mb-0 me-3" target="_blank" href="#">Abrir Fluxo de Caixa  </a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <Link :href="route('logout')" method="post" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-sign-out-alt me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sair</span>
                </Link>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav" @click="toggleSidebar">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</template>