<?php

namespace App\Http\Integrations\Spoonacular\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class FindRecipesByIngredients extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected array $ingredients,
        protected int $ranking = 1,
        protected int $number = 10
    )
    {
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/recipes/findByIngredients';
    }

    public function defaultQuery(): array
    {
        return [
            'ingredients' => join(",", $this->ingredients),
            'ranking' => $this->ranking,
            'number' => $this->number,
        ];
    }
}
