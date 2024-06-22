<script setup>
    import {useForm} from "@inertiajs/vue3";

    const props = defineProps(['previousSearch'])

    const form = useForm({
        ingredients: props.previousSearch ?? "",
    })

    function search() {
        if (form.ingredients.trim().length >= 3) {
            form.post('/search/recipes', {
                onSuccess: params => {
                    console.log(params)
                }
            })
        }
    }

</script>

<template>
    <div class="bg-white rounded-md p-4">
        <form class="space-y-4" action="" method="post" @submit.prevent="search">
            <div>
                <label for="ingredients" class="block text-sm font-medium leading-6 text-gray-900">Search Recipes (comma separated list of ingredients)</label>
                <div class="mt-2">
                    <input v-model="form.ingredients" type="text" name="ingredients" id="ingredients" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="salmon" />
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" :disabled="form.processing" class="bg-green-500 px-4 py-2 text-white rounded-sm"> Search </button>
            </div>
        </form>

        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>
    </div>
</template>

<style scoped>

</style>
