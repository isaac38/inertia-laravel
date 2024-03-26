<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    usuarios: {
        type: Object
    }
});




</script>

<template>

    <Head title="Configuraciones - usuarios" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Configuraciones - Usuarios</h2>
        </template>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-2xl">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Usuario
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rol
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(usuario, index) in usuarios" :key="usuario.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ usuario.name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ usuario.email }}
                                </td>
                                <td class="px-6 py-4">
                                    <p v-for="rol in usuario.roles" :key="rol.id">
                                        {{ rol.name }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <Link href="*">Edit</Link>
                                    |
                                    <Link href="*">Delete</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
