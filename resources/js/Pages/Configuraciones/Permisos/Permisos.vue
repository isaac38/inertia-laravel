<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TablePermisos from './Partials/TablePermisos.vue';
import ModalCreatePermisos from './Partials/ModalCreatePermisos.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    permisos:{
        type: Object
    }
});

</script>
<template>
    <Head title="Configuraciones - permisos" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Configuraciones - Permisos</h2>
        </template>
        <div class="py-2">
            <ModalCreatePermisos />
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-2xl">
                    <TablePermisos :permisos="permisos"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
