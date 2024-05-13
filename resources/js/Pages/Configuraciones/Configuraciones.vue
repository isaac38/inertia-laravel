<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Configuraciones" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Configuraciones</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <a :href="route('config_user_index')"
                    class="flex justify-center flex-col block max-w-64 p-6 bg-white border border-gray-200 rounded-lg shadow-2xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <font-awesome-icon class="h-32" icon="fa-solid fa-user" />

                    <h5 class="mt-2 mb-1 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Usuarios</h5>
                </a>
                <a :href="route('config_role_index')"
                    class="flex justify-center flex-col block max-w-64 p-6 bg-white border border-gray-200 rounded-lg shadow-2xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <font-awesome-icon class="h-32" icon="fa-solid fa-users-gear" />

                    <h5 class="mt-2 mb-1 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Roles</h5>
                </a>

                <a :href="route('config_permisos_index')"
                    class="flex justify-center flex-col block max-w-64 p-6 bg-white border border-gray-200 rounded-lg shadow-2xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <font-awesome-icon class="h-32" icon="fa-solid fa-user-shield" />

                    <h5 class="mt-2 mb-1 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Permisos</h5>
                </a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
