<template>

    <div v-if="$page.props.flash.success" class="bg-green-200 text-green-700 p-3 rounded mb-4">
        {{ $page.props.flash.success }}
    </div>

    <div v-if="$page.props.flash.error" class="bg-red-200 text-red-700 p-3 rounded mb-4">
        {{ $page.props.flash.error }}
    </div>

    <div v-if="form.errors.altitude || form.errors.altitudes" class="bg-red-200 text-red-700 p-3 rounded mb-4">
            <p>{{ form.errors.altitude || form.errors.altitudes}}</p>
    </div>
    <form @submit.prevent="submitData" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="altitude">
                Largeur du continent
            </label>
            <input v-model="form.altitude"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="altitude" type="number" placeholder="Altitude">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="altitudes">
                Altitudes
            </label>
            <span class="text-xs text-red-700"> les éléments de la liste doivent être séparer par une virgule(,) un espace ou un trait d'union(-)</span>
            <input v-model="form.altitudes"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="altitudes" type="text" placeholder="les altitudes">
        </div>
        <div  class="flex items-center justify-between">
            <button :disabled="form.processing"  class="bg-blue-500 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Rechercher
            </button>
        </div>


    </form>
</template>


<script setup>
import { router, useForm } from "@inertiajs/vue3";
let form = useForm({
    altitude: '',
    altitudes: ''
})
const submitData = () => {
   console.log(form)
    form.post("/", {
        onSuccess: () => form.reset(), // Réinitialise si succès
        onError: () => console.log("Erreur détectée")
    })
}

</script>
