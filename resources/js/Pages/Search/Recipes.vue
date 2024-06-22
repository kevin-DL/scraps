<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import RecipeSearchForm from "@/Components/Search/RecipeSearchForm.vue";
import RecipeSearchResultCard from "@/Components/Search/RecipeSearchResultCard.vue";

const props = defineProps({
    recipes: {
        type: Array,
        required: true
    },
    previousSearch: {
        required: false
    }
})
</script>

<template>
    <Head title="Recipe Search"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Recipes ({{ recipes.length }})</h2>
        </template>

        <div class="py-12 space-y-4">
            <div class="max-w-7xl mx-auto">
                <recipe-search-form :previous-search="props.previousSearch" />
            </div>

            <div class="max-w-7xl mx-auto">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 ">
                    <li v-for="recipe in recipes" :key="recipe.id"
                        class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg text-center">
                        <recipe-search-result-card :recipe="recipe"/>
                    </li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
