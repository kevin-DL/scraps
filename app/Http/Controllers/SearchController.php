<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Spoonacular\Requests\FindRecipesByIngredients;
use App\Http\Integrations\Spoonacular\SpoonacularConnector;
use App\Http\Requests\RecipeSearchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function recipes(RecipeSearchRequest $request)
    {
        $data = $request->validated();
        Log::info('Search request', [
            'user' => Auth::user()->id,
            'data' => $data,
        ]);
        $connector = new SpoonacularConnector();
        $request = new FindRecipesByIngredients(
            ingredients: array_map("trim", explode(",", $data['ingredients'])),
            ranking: 1
        );

        $response = $connector->send($request);

        return Inertia::render('Search/Recipes', [
            'recipes' => $response->json(),
            'previousSearch' => $data['ingredients']
        ]);
    }
}
