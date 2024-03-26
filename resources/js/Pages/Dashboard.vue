<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <a :href="route('productos.index')"
                        class="flex justify-center flex-col block max-w-64 p-6 bg-white border border-gray-200 rounded-lg shadow-2xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <font-awesome-icon class="h-32" icon="fa-solid fa-warehouse" />

                        <h5 class="mt-2 mb-1 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Productos</h5>
                    </a>
                    <a :href="route('config.index')"
                        class="flex justify-center flex-col block max-w-64 p-6 bg-white border border-gray-200 rounded-lg shadow-2xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <font-awesome-icon class="h-32" icon="ffa-solid fa-gears" />

                        <h5 class="mt-2 mb-1 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Configuraciones</h5>
                    </a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
