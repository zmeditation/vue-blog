<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

const props = defineProps({
    comment: Object,
    logged_in: Number,
});

const form = useForm({
    content: props.comment.content,
});

function updateComment() {
    router.post(`/comment/${props.comment.id}`, {
        _method: 'put',
        content: form.content,
    })
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
                    <div v-if="comment.user_id == logged_in" class="mt-10">
                        <form @submit.prevent="updateComment" class="bg-white shadow-md m-2 p-2 rounded w-full">
                            <div class="sm:col-span-6">
                                <label for="content" class="block mt-1 text-lg font-medium text-gray-700">Content</label>
                                <div class="mt-2">
                                    <textarea id="content" name="content" v-model="form.content" rows="6" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                            <div class="m-2 p-2">
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indico-600 text-white rounded">Update</button>
                            </div>
                        </form>
                    </div>    
                    <div v-else class="place-content-center mt-20">
                        <h1 class="text-8xl text-gray-500 font-bold text-center">403</h1>
                        <h1 class="text-2xl text-gray-500 font-bold text-center">You are <span class="text-indigo-500">not</span> authorized to edit this blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>