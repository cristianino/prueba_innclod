<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';


const props = defineProps({
    tipTipoDoc: Array,
    proProcesos: Array
});

const form = useForm({
    doc_nombre: '',
    doc_contenido: '',
    doc_id_tipo: 0,
    doc_id_proceso: 0,
});
</script>

<template>
    <Head title="createDocument" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Document</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="form.post('/documento')">
                        <div>
                            <label for="doc_nombre" class="block text-sm font-medium text-gray-700">Nombre del
                                Documento</label>
                            <input type="text" v-model="form.doc_nombre" id="doc_nombre"
                                class="mt-1 block w-full border-gray-300 shadow-sm sm:text-sm rounded-md" required>
                        </div>

                        <div>
                            <label for="doc_contenido" class="block text-sm font-medium text-gray-700">Contenido del
                                Documento</label>
                            <textarea v-model="form.doc_contenido" id="doc_contenido" rows="3"
                                class="mt-1 block w-full border-gray-300 shadow-sm sm:text-sm rounded-md"></textarea>
                        </div>

                        <div>
                            <label for="doc_id_tipo" class="block text-sm font-medium text-gray-700">Tipo de
                                Documento</label>
                            <select v-model="form.doc_id_tipo" id="doc_id_tipo"
                                class="mt-1 block w-full border-gray-300 shadow-sm sm:text-sm rounded-md" required>
                                <option value="" disabled>Seleccione uno...</option>
                                <option v-for="tipo in tipTipoDoc" :key="tipo.TIP_ID" :value="tipo.TIP_ID">{{
                                    tipo.TIP_NOMBRE }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="doc_id_proceso" class="block text-sm font-medium text-gray-700">Proceso
                                Asociado</label>
                            <select v-model="form.doc_id_proceso" id="doc_id_proceso"
                                class="mt-1 block w-full border-gray-300 shadow-sm sm:text-sm rounded-md" required>
                                <option value="" disabled>Seleccione uno...</option>
                                <option v-for="proceso in proProcesos" :key="proceso.PRO_ID" :value="proceso.PRO_ID">{{
                                    proceso.PRO_NOMBRE }}</option>
                            </select>
                        </div>

                        <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">
                            Crear Documento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</AuthenticatedLayout></template>
