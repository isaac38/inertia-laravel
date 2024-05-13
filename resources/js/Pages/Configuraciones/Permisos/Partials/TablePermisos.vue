<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    permisos: {
        type: Object
    }
});


const destroy = (id) => {
    // router.delete(route('config_role_destroy', id))
};

</script>
<template>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre clave
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(permiso, index) in permisos.data" :key="permiso.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ permiso.description }}
                </th>
                <td class="px-6 py-4">
                    {{ permiso.name }}
                </td>
                <td class="px-6 py-4">
                    <button type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        style="cursor: pointer;">
                        Edit
                    </button>
                    |
                    <button type="button" @click="destroy(permiso.id)"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        style="cursor: pointer;">
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="px-1 pt-10">
        <div v-if="permisos.links.length > 3">
            <div class="flex flex-wrap">
                <template v-for="(link, key) in permisos.links">
                    <div v-if="link.url === null" :key="key"
                        class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded"
                        v-html="link.label" />
                    <Link v-else :key="`link-${key}`"
                        class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded"
                        :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
                </template>
            </div>
        </div>
    </div>
</template>
