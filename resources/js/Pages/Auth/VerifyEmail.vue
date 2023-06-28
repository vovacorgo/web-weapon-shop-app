<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Дякуємо за реєстрацію!
        </div>

        <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400" v-if="verificationLinkSent">
            На електронну адресу, яку ви вказали під час реєстрації, було надіслано нове посилання для підтвердження.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Повторно надіслати електронний лист з підтвердженням
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="rounded-md text-sm text-gray-600 underline focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:text-gray-900 dark:text-gray-400 dark:focus:ring-offset-gray-800 dark:hover:text-gray-100"
                    >Log Out</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
