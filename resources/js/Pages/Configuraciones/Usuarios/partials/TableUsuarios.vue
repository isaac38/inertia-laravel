<script setup>
import { defineProps } from 'vue';
import ModalUpdateUsuarios from './ModalUpdateUsuarios.vue';
import { router } from '@inertiajs/vue3';
const props = defineProps({
    usuarios: Object,
    roles: Object
});

const destroy = (id) => {
    router.delete(route('config.user.delete', id))
};

</script>

<template>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
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
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ usuario.nombre }} {{ usuario.apellidoP }} {{ usuario.apellidoM }}
                </th>
                <td class="px-6 py-4">
                    {{ usuario.username }}
                </td>
                <td class="px-6 py-4">
                    {{ usuario.email }}
                </td>
                <td class="px-6 py-4">
                    <p v-for="rol in usuario.roles" :key="rol.id">
                        {{ rol.name }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <ModalUpdateUsuarios :usuario="usuario" :roles="roles"/>
                    |
                    <button type="button" @click="destroy(usuario.id)"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        style="cursor: pointer;">
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- <div class="px-1 pt-10">
        <div v-if="productos.links.length > 3">
            <div class="flex flex-wrap">
                <template v-for="(link, key) in productos.links">
                    <div v-if="link.url === null" :key="key"
                        class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded"
                        v-html="link.label" />
                    <Link v-else :key="`link-${key}`"
                        class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded"
                        :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
                </template>
            </div>
        </div>
    </div> -->
</template>
