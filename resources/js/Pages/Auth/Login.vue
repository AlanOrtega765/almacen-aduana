<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

import { Head, useForm } from "@inertiajs/vue3";

const form = useForm({
    username: "",
    password: "",
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <h1 class="text-xl font-semibold">Iniciar Sesión</h1>
        <form class="mt-4" @submit.prevent="submit">
            <div>
                <InputLabel for="username" value="Usuario" />

                <div class="relative flex items-center mt-1">
                    <font-awesome-icon class="absolute left-3" icon="user" />
                    <TextInput
                        id="username"
                        type="text"
                        class="block w-full pl-9 border-light-gray"
                        v-model="form.username"
                        required
                    />
                </div>

                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Contraseña" />

                <div class="relative flex items-center mt-1">
                    <font-awesome-icon class="absolute left-3" icon="lock" />
                    <TextInput
                        id="password"
                        type="password"
                        class="block w-full pl-9 border-light-gray"
                        v-model="form.password"
                        required
                    />
                </div>

                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="bg-light-gray h-[1px] w-full my-6"></div>
            <PrimaryButton class="w-full"> Ingresar </PrimaryButton>
        </form>
    </GuestLayout>
</template>
