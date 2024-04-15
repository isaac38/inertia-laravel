<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TablePorductos from './Partials/TablePorductos.vue';
import ModalCreateProduct from './Partials/ModalCreateProduct.vue'

const props = defineProps({
    productos: {
        type: Object
    }
});

</script>

<template>

    <Head title="Productos" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Productos</h2>
        </template>
        <div class="py-2">
            <!-- Modal nuevo producto -->
            <ModalCreateProduct />
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-2xl">
                    <TablePorductos :productos="productos"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
