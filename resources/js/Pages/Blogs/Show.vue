 <script setup>  
 import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
 import { Head, Link, useForm } from '@inertiajs/vue3';

 const props = defineProps({
     blog: Array,
     user_name: String,
     logged_in: Number,
    });

 const created_at = props.blog.created_at.slice(0, 10);

 const form = useForm({
     content: null,
 });

function storeComment() {
    form.post(`/blog/${props.blog.id}/comment`);
    form.reset();
}

 </script>

 <template>  
     <Head title="Blog" />  
     <AuthenticatedLayout>
         <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
                     <div class="mt-3" v-if="blog.user_id == logged_in">
                         <Link :href="`/blog/${blog.id}`" method="delete" as="button" type="button" class=" float-right mr-3 inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700  sm:ml-3 sm:w-auto sm:text-sm">Delete</Link>
                         <Link :href="`/blog/${blog.id}/edit`"><button type="button" class=" float-right inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Edit</button></Link>
                     </div>
                        <div class="container mx-auto flex flex-wrap pt-6">
                            <div class="w-full md:w-1/2 flex items-center">
                                <img :src="/storage/ + blog.image" class="ml-16 w-10/12 h-5/6 max-h-96"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="flex flex-col justify-center h-full pr-5 pl-5 pb-5">
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ blog.title }}</h1>
                                    <p class="leading-relaxed mb-8">{{ blog.content }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col justify-center items-center h-full pr-5 pl-5">
                                <p class="leading-relaxed mb-5"> {{ created_at }} by <span class="text-indigo-500"> {{ user_name }} </span></p>
                            </div>
                        </div>
                        <div class="flex justify-center flex-col items-center mb-5">
                            <h1 class="text-lg">Write a comment</h1>
                            <form @submit.prevent="storeComment" class="flex flex-col items-center w-4/6">
                                <textarea name="content" id="content" v-model="form.content" class="mb-5 w-full resize-none" rows="4"></textarea>
                                <button type="submit" class="inline-flex w-2/6 justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 sm:ml-3 sm:text-sm">Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
</template>