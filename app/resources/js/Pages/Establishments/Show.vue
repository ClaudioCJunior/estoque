<template>
    <AuthenticatedLayout>
        <Head title="View Establishment" />
        <div class="container">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <PageName name="Visualizar Estabelecimento"/>                  
                        <div class="card-body p-2">
                            <div class="d-flex flex-column">
                                <span class="mb-2 text-xs">Nome: <span class="text-dark font-weight-bold ms-sm-2">{{ establishment.name }}</span></span>
                                <span class="mb-2 text-xs">Endereço: <span class="text-dark ms-sm-2 font-weight-bold">{{ establishment.address }}</span></span>
                            </div>
                            <Link :href="route('establishments.index')" class="btn btn-secondary mt-4">Back to List</Link>
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
import PageName from '@/Components/PageName.vue';

const props = defineProps({
    establishment: Object,
});
</script>