<script setup>
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite';
import { onMounted, ref, defineProps } from 'vue';

const props = defineProps({
    usuario: Object,
    roles: Object,
    permisos: Object
});

let modalObjet = ref();

let permisosInUsuario = props.usuario?.permissions.map(item => item.name);
let rolInUsuario = props.usuario?.roles[0].name


onMounted(() => {
    let modalElement = document.getElementById(`update-modal${props.usuario.id}`);
    modalObjet = new Modal(modalElement);
})



const openModal = () => {
    modalObjet.show();
}

const closeModal = () => {
    modalObjet.hide();
}

const form = useForm({
    id: props.usuario?.id,
    nombre: props.usuario?.nombre,
    apellidoP: props.usuario?.apellidoP,
    apellidoM: props.usuario?.apellidoM,
    username: props.usuario?.username,
    email: props.usuario?.email,
    password: null,
    rol: rolInUsuario,
    permiso: permisosInUsuario
});


function submit() {
    form.put(route('config_user_update'))
    closeModal()
};

</script>

<template>

    <button type="button" @click="openModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        Edit
    </button>
    <div :id="`update-modal${form.id}`" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Editar Usuario
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
                        <div class="gap-8 columns-3">
                            <div class="mb-5">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" id="nombre" name="nombre" v-model="form.nombre"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Nombre" required />
                            </div>
                            <div class="mb-5">
                                <label for="apellidoP"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos paterno</label>
                                <input type="text" id="apellidoP" name="apellidoP" v-model="form.apellidoP"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Apellido paterno" required />
                            </div>
                            <div class="mb-5">
                                <label for="apellidoM"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido materno</label>
                                <input type="text" id="apellidoM" name="apellidoM" v-model="form.apellidoM"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Apellido materno" required />
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de usuario</label>
                            <input type="text" id="username" name="username" v-model="form.username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Usuario" required />
                        </div>
                        <div class="gap-8 columns-2">
                            <div class="mb-5">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                                <input type="email" id="email" name="email" v-model="form.email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Correo electronico" required />
                            </div>
                            <div class="mb-5">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                                <input type="text" id="password" name="password" v-model="form.password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Nueva contraseña" />
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="roles"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                            <select id="roles" name="roles" v-model="form.rol"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="role in roles" :key="role.id" :value="role.name">{{ role.name }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Asignar permisos:
                            </label>
                            <div class="overflow-y-auto h-52">
                                <div class="grid grid-cols-3 gap-4">
                                    <div v-for="(permis, index) in permisos" :key="permis.id"
                                        class="flex items-center ps-4 border border-gray-700 rounded dark:border-gray-700">
                                        <input :id="permis.id" type="checkbox" :value="permis.name" :name="permis.id"
                                            v-model="form.permiso"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label :for="permis.id"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ permis.description }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" :data-modal-hide="`update-modal${form.id}`"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
</template>
