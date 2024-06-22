<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Spoonacular\Requests\FindRecipesByIngredients;
use App\Http\Integrations\Spoonacular\SpoonacularConnector;
use App\Http\Requests\RecipeSearchRequest;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function recipes(RecipeSearchRequest $request)
    {
        $data = $request->validated();
        $connector = new SpoonacularConnector();
        $request = new FindRecipesByIngredients(
            ingredients: array_map("trim", explode(",", $data['ingredients'])),
            ranking: 2
        );

        $response = $connector->send($request);

        return Inertia::render('Search/Recipes', [
            'recipes' => $response->json(),
            'previousSearch' => $data['ingredients']
        ]);
    }
}
