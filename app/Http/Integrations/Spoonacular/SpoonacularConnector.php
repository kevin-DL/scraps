<?php

namespace App\Http\Integrations\Spoonacular;

use Saloon\Http\Auth\QueryAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class SpoonacularConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return config('services.spoonacular.api_url');
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }

    protected function defaultQuery(): array
    {
        return [];
    }

    protected function defaultAuth(): QueryAuthenticator
    {
        return new QueryAuthenticator('apiKey', config('services.spoonacular.api_key'));
    }
}
