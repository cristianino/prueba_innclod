<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


const props = defineProps({
    documents: {
        type: [],
    },
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Documents</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Código</th>
                                <th class="px-4 py-2">Contenido</th>
                                <th class="px-4 py-2">Tipo</th>
                                <th class="px-4 py-2">Proceso</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="doc in documents" :key="doc.DOC_ID" class="border-b">
                                <td class="px-4 py-2">{{ doc.DOC_ID }}</td>
                                <td class="px-4 py-2">{{ doc.DOC_NOMBRE }}</td>
                                <td class="px-4 py-2">{{ doc.DOC_CODIGO }}</td>
                                <td class="px-4 py-2">{{ doc.DOC_CONTENIDO }}</td>
                                <td class="px-4 py-2">{{ doc.tipo_doc.TIP_NOMBRE }}</td>
                                <td class="px-4 py-2">{{ doc.proceso.PRO_NOMBRE }}</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</button>
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
