<script setup>
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite';
import { ref, onMounted, defineProps, inject } from 'vue';
import Permisos from '../../Permisos/Permisos.vue';

const props = defineProps({
    roles: {
        type: Object,
        default: () => ({})
    },
    permisos: {
        type: Object,
        default: () => ({})
    }
});

let swal = inject('$swal')

let modalObjet = ref();

onMounted(() => {
    const targetEl = document.querySelector('#create-modal');
    modalObjet = new Modal(targetEl);
})

const form = useForm({
    nombre: null,
    apellidoP: null,
    apellidoM: null,
    username: null,
    email: null,
    password: null,
    rol: null,
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

    form.post(route('config_user_store'), {
            onSuccess: () => {
                form.reset()
                closeModal()
                swalAlert()
            }
        }
    )
};

</script>

<template>
    <div class="flex justify-end max-w-7xl mx-auto">
        <div class="sm:px-6 lg:px-8 py-auto sm:py-6 lg:pt-8">
            <button @click="openModal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Nuevo usuario <font-awesome-icon icon="fa-solid fa-plus" />
            </button>
        </div>
    </div>
    <div id="create-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Agregar Usuario
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
                        <div class="gap-8 columns-3">
                            <div class="mb-5">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" id="nombre" name="nombre" v-model="form.nombre"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Nombre" />
                                <span class="text-red-600" v-if="form.errors.nombre">{{ form.errors.nombre }}</span>
                            </div>
                            <div class="mb-5">
                                <label for="apellidoP"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                                    Paterno</label>
                                <input type="text" id="apellidoP" name="apellidoP" v-model="form.apellidoP"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Apellido paterno" />
                                <span class="text-red-600" v-if="form.errors.apellidoP">{{ form.errors.apellidoP }}</span>
                            </div>
                            <div class="mb-5">
                                <label for="apellidoM"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                                    Materno</label>
                                <input type="text" id="apellidoM" name="apellidoM" v-model="form.apellidoM"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Apellido materno" />
                                <span class="text-red-600" v-if="form.errors.apellidoM">{{ form.errors.apellidoM }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de
                                usuario</label>
                            <input type="text" id="username" name="username" v-model="form.username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre de usuario" />
                            <span class="text-red-600" v-if="form.errors.username">{{ form.errors.username }}</span>
                        </div>
                        <div class="gap-8 columns-2">
                            <div class="mb-5">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" id="email" name="email" v-model="form.email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Correo electronico" />
                                <span class="text-red-600" v-if="form.errors.email">{{ form.errors.email }}</span>
                            </div>
                            <div class="mb-5">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                                <input type="text" id="password" name="password" v-model="form.password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Contraseña" />
                                <span class="text-red-600" v-if="form.errors.password">{{ form.errors.password }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="roles"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                            <select id="roles" name="roles" v-model="form.rol"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="(rol, index) in roles" :key="index" :value="rol.name">{{ rol.name }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Asignar permisos:
                            </label>
                            <div class="overflow-y-auto h-52">
                                <div class="grid grid-cols-3 gap-4">
                                    <div v-for="(permiso, index) in permisos" :key="permiso.id"
                                        class="flex items-center ps-4 border border-gray-700 rounded dark:border-gray-700">
                                        <input :id="permiso.id" type="checkbox" :value="permiso.name" :name="permiso.id"
                                            v-model="form.permisos"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label :for="permiso.id"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ permiso.description }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            :disabled="form.processing">Guardar</button>
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
</template>
