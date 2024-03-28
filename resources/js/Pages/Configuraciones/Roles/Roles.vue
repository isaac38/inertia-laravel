<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableRoles from './partials/TableRoles.vue';
import ModalCreateRoles from './partials/ModalCreateRoles.vue';

const props = defineProps ({
    roles:{
        type: Object
    },
    permisos:{
        type: Object
    }

});
</script>
<template>
    <Head title="Configuraciones - roles"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Configuraciones - Roles</h2>
        </template>
        <div class="py-2">
            <ModalCreateRoles :permisos="permisos"/>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-2xl">
                    <TableRoles :roles="roles"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


