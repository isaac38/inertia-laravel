<script setup>
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite';
import { onMounted, ref, defineProps } from 'vue';

const props = defineProps({
    producto: Object
});


let modalObjet = ref();


onMounted(() => {
    let modalElement = document.getElementById(`update-modal${props.producto.id}`);
    modalObjet = new Modal(modalElement);
})



const openModal = () => {
    modalObjet.show();

}

const closeModal = () => {
    modalObjet.hide();
}

const form = useForm({
    id: props.producto?.id,
    producto: props.producto?.producto,
    descripcion: props.producto?.descripcion,
    categoria: props.producto?.categoria,
    stock: props.producto?.stock,
    precioUni: props.producto?.precioUni,
    status: props.producto?.status == 1 ? true : false
});

function submit() {
    form.put(route('producto.update'))
    closeModal()
};

</script>

<template>

    <button type="button" @click="openModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        Edit
    </button>
    <div :id="`update-modal${form.id}`" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Editar producto
                    </h3>
                    <button type="button" @click="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="mx-auto" @submit.prevent="submit()">
                        <div class="mb-5">
                            <label for="producto"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producto</label>
                            <input type="text" id="producto" name="producto" v-model="form.producto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre del producto" required />
                        </div>
                        <div class="mb-5">
                            <label for="categoria"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                            <input type="text" id="categoria" name="categoria" v-model="form.categoria"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre del producto" required />
                        </div>
                        <div class="mb-5">
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                            <textarea id="descripcion" name="descripcion" rows="4" v-model="form.descripcion"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Descripcion del producto"></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="stock"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                            <input type="number" id="stock" name="stock" v-model="form.stock"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="precioUni"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                                unitario</label>
                            <input type="number" id="precioUni" name="precioUni" v-model="form.precioUni"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label class="inline-flex items-center mb-5 cursor-pointer">
                                <input type="checkbox" id="status" name="status" class="sr-only peer"
                                    v-model="form.status" checked>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Activo</span>
                            </label>
                        </div>
                        <button type="submit" :data-modal-hide="`update-modal${form.id}`"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
</template>
