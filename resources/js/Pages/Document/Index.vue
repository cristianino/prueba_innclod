<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Documents</h2>
        </template>

        <div class="py-12">
            <div v-if="$page.props.flash?.success"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ $page.props.flash.success }}
            </div>

            <div v-if="$page.props.flash?.error"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ $page.props.flash.error }}
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between mb-4">
                        <div>
                            <input v-model="searchQuery" type="text" placeholder="Buscar por nombre..."
                                class="px-4 py-2 border rounded" @input="filterDocuments" />
                        </div>
                        <div>
                            <button @click="addNewDocument"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Añadir Nuevo
                            </button>
                        </div>
                    </div>
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
                            <tr v-for="doc in filteredDocuments" :key="doc.DOC_ID" class="border-b">
                                <td class="px-4 py-2">{{ doc.DOC_ID }}</td>
                                <td class="px-4 py-2">{{ doc.DOC_NOMBRE }}</td>
                                <td class="px-4 py-2">{{ doc.DOC_CODIGO }}</td>
                                <td class="px-4 py-2">{{ doc.DOC_CONTENIDO }}</td>
                                <td class="px-4 py-2">{{ doc.tipo_doc.TIP_NOMBRE }}</td>
                                <td class="px-4 py-2">{{ doc.proceso.PRO_NOMBRE }}</td>
                                <td class="px-4 py-2">
                                    <button @click="editDocument(doc.DOC_ID)"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</button>
                                    <button @click="deleteDocument(doc.DOC_ID)"
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

<script>
export default {
    props: {
        documents: Array
    },
    data() {
        return {
            searchQuery: '',
            filteredDocuments: this.documents
        };
    },
    methods: {
        filterDocuments() {
            if (this.searchQuery) {
                this.filteredDocuments = this.documents.filter(doc => {
                    return Object.values(doc).some(
                        value =>
                            value !== null &&
                            value.toString().toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                });
            } else {
                this.filteredDocuments = this.documents;
            }
        },
        addNewDocument() {
            this.$inertia.visit('/documento/create');
        },
        editDocument(docId) {
            this.$inertia.visit(`/documento/${docId}/edit`);
        },
        deleteDocument(docId) {
            if (confirm('¿Estás seguro de que deseas eliminar este documento?')) {
                // Hacer una petición DELETE a la ruta correspondiente.
                this.$inertia.delete(`/documento/${docId}`, {
                    onSuccess: () => {
                        // Aquí podrías actualizar el estado local o forzar una recarga si es necesario.
                    },
                    onError: (errors) => {
                        // Manejar errores si es necesario.
                    }
                });
            }
        }
    },
    watch: {
        documents(newDocuments) {
            this.filteredDocuments = newDocuments;
        }
    }
}
</script>