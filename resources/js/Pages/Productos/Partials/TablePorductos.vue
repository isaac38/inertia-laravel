<script setup>
import { reactive } from 'vue';
import ModalUpdateProduct from './ModalUpdateProduct.vue';
import { Link, router } from '@inertiajs/vue3';
const props = defineProps({
    productos: {
        type: Object
    }
});

const destroy = (id) => {
    router.delete(route('producto.destroy', id))
};

</script>

<template>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Producto
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio Unitario
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="producto in productos.data" :key="producto" class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ producto.producto }}
                </th>
                <td class="px-6 py-4">
                    {{ producto.descripcion }}
                </td>
                <td class="px-6 py-4">
                    {{ producto.categoria }}
                </td>
                <td class="px-6 py-4">
                    {{ producto.stock }}
                </td>
                <td class="px-6 py-4">
                    $ {{ producto.precioUni }}
                </td>
                <td class="px-6 py-4">
                    <span v-if="producto.status == 1"
                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full">
                        </span>
                        Activo
                    </span>
                    <span v-else
                        class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                        <span class="w-2 h-2 me-1 bg-red-500 rounded-full">
                        </span>
                        Inactivo
                    </span>
                </td>
                <td class="px-6 py-4">
                    <ModalUpdateProduct :producto="producto" />
                    |
                    <button type="button" @click="destroy(producto.id)"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        style="cursor: pointer;">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="px-1 pt-10">
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
    </div>
</template>
