<template>
    <AuthenticatedLayout>
        <div class="container">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <PageName name="Estabelecimentos"/>
                        <Link :href="route('establishments.create')" class="btn btn-outline-success">Novo</Link>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="establishments.length === 0">
                                        <td colspan="3" class="text-center">No establishments found.</td>
                                    </tr>
                                    <tr v-else v-for="establishment in establishments" :key="establishment.id">
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ establishment.name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ establishment.address }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <Link :href="route('establishments.edit', establishment.id)" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-original-title="Editar">
                                                    Alterar
                                                </Link>
                                                <Link :href="route('establishments.show', establishment.id)" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-original-title="Visualizar">
                                                    View
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PageName from '@/Components/PageName.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    establishments: Array,
});

//const csrf = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
</script>