<script setup>
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite';
import { ref, onMounted, reactive, inject } from 'vue';

const props = defineProps({
    permisos: {
        type: Object
    }
});

let swal = inject('$swal')

let modalObjet = ref();

onMounted(() => {
    const targetEl = document.querySelector('#create-modal');
    modalObjet = new Modal(targetEl);
})

const form = useForm({
    name: null,
    permisos: []
});

const openModal = () => {
    modalObjet.show();

}

const closeModal = () => {
    modalObjet.hide();
}

const swalAlert = () => {
    swal({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,

        icon: 'success',
        title: 'El usuario se a creado'
    });
}

const submit = () => {

    form.post(route('config.role.store')
    // , {
    //         onSuccess: () => {
    //             form.reset()
    //             closeModal()
    //             swalAlert()
    //         }
    //     }
    )
};

</script>

<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-auto sm:py-6 lg:pt-8">
        <button @click="openModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Nuevo rol
        </button>
    </div>
    <div id="create-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Agregar producto
                    </h3>
                    <button type="button" @click="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="create-modal">
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
                    <form class="mx-auto" @submit.prevent="submit">
                        <div class="mb-5">
                            <label for="nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                            <input type="text" id="nombre" name="nombre" v-model="form.name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre del rol" />
                            <!-- <span class="text-red-600" v-if="form.errors.producto">{{ form.errors.producto }}</span> -->
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Permisos
                            </label>
                            <div class="grid grid-cols-3 gap-4">
                                <div v-for="(permiso, index) in permisos" :key="permiso.id" class="flex items-center ps-4 border border-gray-700 rounded dark:border-gray-700">
                                    <input :id="permiso.id" type="checkbox" :value="permiso.name" :name="permiso.id" v-model="form.permisos"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label :for="permiso.id"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ permiso.description }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
</template>
