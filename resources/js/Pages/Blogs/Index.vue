<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    blogs: Array
});
</script>

<template>
    <Head title="Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/blog/create" class="px-4 py-2 bg-indigo-500 hover:bg-indico-600 text-white rounded">Create</Link>
                </div>
                <div v-for="blog in blogs" :key="blog.id" class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
                    <div class="mt-3">
                        <Link :href="`/blog/${blog.id}`" method="delete" as="button" type="button" class=" float-right mr-3 inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700  sm:ml-3 sm:w-auto sm:text-sm">Delete</Link>
                        <Link :href="`/blog/${blog.id}/edit`"><button type="button" class=" float-right inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Edit</button></Link>
                    </div>
                        <div class="container mx-auto flex flex-wrap py-6">
                        <div class="w-full md:w-1/2">
                            <img :src="blog.image" class="ml-16 w-10/12 h-5/6"/>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="flex flex-col justify-center h-full pr-5 pl-5 pb-5">
                                <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ blog.title }}</h1>
                                <p class="leading-relaxed mb-8">{{ blog.content }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col justify-center h-full pr-5 pl-5 pb-5">
                            <p class="leading-relaxed mb-8 ml-10">Gemaakt door: {{ blog.user_name }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
