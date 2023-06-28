<script setup>
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.personal-information.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Видалити обліковий запис</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Після видалення вашого облікового запису всі його ресурси та дані будуть безповоротно видалені. Перш ніж видалити
                будь ласка, завантажте всі дані або інформацію, які ви хочете зберегти.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">Видалити обліковий запис</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Ви впевнені, що хочете видалити свій обліковий запис?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Після видалення вашого облікового запису всі його ресурси та дані будуть видалені назавжди. Будь ласка
                    введіть свій пароль, щоб підтвердити, що ви бажаєте назавжди видалити свій обліковий запис.
                </p>

                <div class="mt-6">
                    <InputLabel for="password" value="Пароль" class="sr-only" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Скасувати </SecondaryButton>

                    <DangerButton
                        type="submit"
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Видалити обліковий запис
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
