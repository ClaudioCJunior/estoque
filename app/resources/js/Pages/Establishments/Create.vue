<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PageName from '@/Components/PageName.vue';
import Form from './Form.vue';
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Create Establishment" />
        <div class="container">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <PageName name="Criar Estabelecimento"/>                  
                        <div class="card-body p-2">
                            <Form
                                :submitRoute="route('establishments.store')"
                                submitButtonText="Create"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>