<script setup>
    const props = defineProps({
        recipe: {
            required: true
        }
    })


</script>

<template>
    <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <img class="object-cover w-full h-64" :src="recipe.image" :alt="recipe.title">

        <div class="p-6 h-full">
            <div>
                <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">Recipe</span>
                <a href="#" class="block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline" tabindex="0" role="link">{{ recipe.title }}</a>
            </div>

            <div class="mt-4 border-t border-gray-100 text-white">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6">Used Ingredients ({{ recipe.usedIngredientCount}})</dt>
                        <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0">
                            {{ recipe.usedIngredients.map((item) => item.name).join(", ") }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 ">Missing Ingredients ({{ recipe.missedIngredientCount }})</dt>
                        <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0">
                            {{ recipe.missedIngredients.map((item) => item.name).join(", ") }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
