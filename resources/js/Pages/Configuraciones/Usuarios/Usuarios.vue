<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableUsuarios from './partials/TableUsuarios.vue';
import ModalCreateUsuarios from './partials/ModalCreateUsuarios.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    usuarios: {
        type: Object
    },
    roles: {
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
        <div class="py-2">
            <ModalCreateUsuarios :roles="roles"/>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-2xl">
                    <TableUsuarios :usuarios="usuarios" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
