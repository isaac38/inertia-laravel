<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableUsuarios from './partials/TableUsuarios.vue';
import ModalCreateUsuarios from './partials/ModalCreateUsuarios.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    usuarios:{
        type: Object,
        default: () => ({})
    },
    roles: {
        type: Object,
        default: () => ({})
    },
    permisos : {
        type: Object,
        default: () => ({})
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
            <ModalCreateUsuarios
            :roles="roles"
            :permisos="permisos"
            />
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-2xl">
                    <!-- <template v-if="usuarios.roles"> -->
                        <TableUsuarios
                        :usuarios="usuarios"
                        :roles="roles"
                        :permisos="permisos"
                        />
                    <!-- </template> -->
                    <!-- <template v-else>
                        <div class="flex items-center justify-center">
                            <div class="text-center">
                                <p class="text-2xl text-gray-500">No hay usuarios registrados</p>
                            </div>
                        </div>
                    </template>     -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
