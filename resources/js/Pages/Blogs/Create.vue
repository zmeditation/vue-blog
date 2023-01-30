<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: null,
    content: null,
    image: null,
    user_id: null,
});

function storeBlog() {
    form.post('/blog');
}

</script>

<template>
    <Head title="Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <Link href="/blog" class="px-4 py-2 bg-indigo-500 hover:bg-indico-600 text-white rounded">Back</Link>
                </div>
                <div>
                    <div class="grid place-content-center mt-10">
                        <form @submit.prevent="storeBlog" class="bg-white shadow-md m-2 p-2 rounded">
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" v-model="form.title" autocomplete="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="content" class="block mt-1 text-lg font-medium text-gray-700">Content</label>
                                <div class="mt-2">
                                    <textarea id="content" name="content" v-model="form.content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="image" class="block mt-1 text-lg font-medium text-gray-700">Image</label>
                                <div class="mt-2">
                                    <input type="file" name="image" id="image" @input="form.image = $event.target.files[0]" class="shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="m-2 p-2">
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indico-600 text-white rounded">Create</button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
