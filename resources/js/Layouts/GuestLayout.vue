<script setup></script>

<template>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-tertiary"
    >
        <div
            class="flex w-full max-w-2xl px-6 py-4 bg-just-white shadow-md rounded-lg"
        >
            <img
                class="w-1/2"
                src="../../images/logo_login.png"
                alt="Logo Aduana"
            />
            <div class="flex flex-col justify-center mx-auto">
                <slot />
            </div>
        </div>
    </div>
</template>
