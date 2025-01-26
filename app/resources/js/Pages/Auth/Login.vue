<template>
    <main class="main-content mt-0 ps d-flex align-items-center justify-content-center min-vh-100">
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Bem Vindo</h3>
                                <p class="mb-0">Insira email e senha para realizar o login</p>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="submit" role="form">
                                    <label for="email">Email</label>
                                    <div class="mb-3">
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control"
                                            placeholder="Email"
                                            v-model="form.email"
                                            required
                                            autofocus
                                            autocomplete="username"
                                        />
                                        <InputError :message="form.errors.email" class="mt-2" />
                                    </div>
                                    <label for="password">Senha</label>
                                    <div class="mb-3">
                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control"
                                            placeholder="Password"
                                            v-model="form.password"
                                            required
                                            autocomplete="current-password"
                                        />
                                        <InputError :message="form.errors.password" class="mt-2" />
                                    </div>
                                    <div class="form-check form-switch">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="rememberMe"
                                            v-model="form.remember"
                                        />
                                        <label class="form-check-label" for="rememberMe">Lembre-me</label>
                                    </div>
                                    <div class="text-center">
                                        <PrimaryButton
                                            class="btn bg-gradient-info w-100 mt-4 mb-0"
                                            :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing"
                                        >
                                            Login
                                        </PrimaryButton>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <Link :href="route('register')" class="text-info text-gradient font-weight-bold">Sign up</Link>
                                </p>
                                <p class="mb-4 text-sm mx-auto">
                                    <Link :href="route('password.request')" class="text-info text-gradient font-weight-bold">Forgot your password?</Link>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

function submit() {
    form.post(route('login'));
}
</script>

<style scoped>
/* Add any additional styles if needed */
</style>