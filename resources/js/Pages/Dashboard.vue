<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-16">Dashboard</h2>
        </template>
            <div class="pb-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <main class="p-6 sm:p-10 space-y-6">
                        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                Je bent succesvol ingelogd!
                            </div>
                            <div class="p-6 bg-white border-b border-gray-200">
                                Je kunt de blog posts bekijken op de <a href="/blog" class="text-indigo-500">blog</a> pagina.
                            </div>
                        </div>    
                        <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-2xl font-bold">127</span>
                                    <span class="block text-gray-500">Users</span>
                                </div>
                            </div>
                            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-2xl font-bold">6.8</span>
                                    <span class="block text-gray-500">Average 
                                        <a href="/blog" class="text-indigo-500">posts</a>
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="inline-block text-2xl font-bold">9</span>
                                    <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span>
                                    <span class="block text-gray-500">
                                        <a href="/blog" class="text-indigo-500">posts</a>
                                    per week</span>
                                </div>
                            </div>
                            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-2xl font-bold">83%</span>
                                    <span class="block text-gray-500">Clicks</span>
                                </div>
                            </div>
                        </section>
                        <section class="grid md:grid-cols-2 xl:grid-cols-2 gap-6">
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    De informatie op deze pagina is niet echt, het is alleen een voorbeeld.
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    Je kunt je profiel bekijken op de <a href="/profile" class="text-indigo-500">profiel</a> pagina.
                                </div>
                            </div>
                        </section>
                    </main>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
