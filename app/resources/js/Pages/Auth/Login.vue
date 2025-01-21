<template>
    <main class="main-content mt-0 ps">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                    <p class="mb-0">Enter your email and password to sign in</p>
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
                                        <label for="password">Password</label>
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
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <PrimaryButton
                                                class="btn bg-gradient-info w-100 mt-4 mb-0"
                                                :class="{ 'opacity-25': form.processing }"
                                                :disabled="form.processing"
                                            >
                                                Sign in
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
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" :style="{ backgroundImage: `url(${loginImage})`, backgroundPosition: 'center', backgroundSize: '80% 100%', backgroundSize: '80% 100%'  }"></div>
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
import loginImage from '@/assets/img/login.jpg'; // Importe a imagem

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'));
};
</script>