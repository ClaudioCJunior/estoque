<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    establishment: {
        type: Object,
        default: () => ({
            name: '',
            address: '',
        }),
    },
    submitRoute: {
        type: String,
        required: true,
    },
    submitMethod: {
        type: String,
        default: 'post',
    },
    submitButtonText: {
        type: String,
        default: 'Submit',
    },
});

const form = useForm({
    name: props.establishment.name,
    address: props.establishment.address,
});

const submit = () => {
    form[props.submitMethod](props.submitRoute, {
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {
                form.reset('name');
            }
            if (form.errors.address) {
                form.reset('address');
            }
        },
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="mt-6 space-y-6">
        <div class="form-group">
            <InputLabel :htmlFor="'name'" value="Name" />
            <input
                id="name"
                v-model="form.name"
                type="text"
                class="form-control form-control-alternative"
                required
            />
            <InputError :message="form.errors.name" class="mt-2" />
        </div>
        <div class="form-group">
            <InputLabel :htmlFor="'address'" value="Address" />
            <input
                id="address"
                v-model="form.address"
                type="text"
                class="form-control form-control-alternative"
                required
            />
            <InputError :message="form.errors.address" class="mt-2" />
        </div>
        <div class="flex items-center gap-4">
            <button class="btn bg-gradient-success" type="submit">
                {{ submitButtonText }}
            </button>
            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">
                    {{ submitButtonText === 'Create' ? 'Created.' : 'Updated.' }}
                </p>
            </Transition>
        </div>
    </form>
</template>