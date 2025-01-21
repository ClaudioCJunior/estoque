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
                                    <tr v-if="establishments.data.length === 0">
                                        <td colspan="3" class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Nenhum estabelecimento encontrado</p>
                                            </td>
                                    </tr>
                                    <tr v-else v-for="establishment in establishments.data" :key="establishment.id">
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
                                                <Link :href="route('establishments.edit', establishment.id)" class="btn bg-gradient-warning btn-sm" data-toggle="tooltip" data-original-title="Editar">
                                                    Alterar
                                                </Link>
                                                <Link :href="route('establishments.show', establishment.id)" class="btn bg-gradient-info btn-sm" data-toggle="tooltip" data-original-title="View establishment">
                                                    View
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <Pagination :links="establishments.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'; // Certifique-se de ter um componente de paginação
import PageName from '@/Components/PageName.vue';

const props = defineProps({
    establishments: Object,
});
</script>