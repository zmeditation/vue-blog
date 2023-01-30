<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Dashboard</Link
            >

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                    >Register</Link
                >
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center w-1/2">
            <h2 class="text-4xl text-gray-500 dark:text-gray-400 font-semibold uppercase tracking-wide mb-6">Inertia - Vue 3 - Laravel</h2>
            
            <h1 class="text-8xl text-indigo-500 dark:text-indigo-400 font-semibold uppercase tracking-wide mb-6 hover:text-indigo-600 dark:hover:text-indigo-500 duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">Blog</h1>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center w-1/2">
            <img src="../../Images/thumbnail.png" class="w-1/2 rounded border-8 border-gray-400 hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
        </div>

    </div>
</template>
