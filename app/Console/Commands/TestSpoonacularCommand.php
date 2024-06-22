<?php

namespace App\Console\Commands;

use App\Http\Integrations\Spoonacular\Requests\FindRecipesByIngredients;
use App\Http\Integrations\Spoonacular\SpoonacularConnector;
use Illuminate\Console\Command;

class TestSpoonacularCommand extends Command
{
    protected $signature = 'test:spoonacular';

    protected $description = 'Command description';

    public function handle(): void
    {
        $connector = new SpoonacularConnector();
        $request = new FindRecipesByIngredients(
            ingredients: ['salmon', 'cheese', 'tomato'],
            ranking: 2
        );

        $response = $connector->send($request);
        dd($response->json());
    }
}
