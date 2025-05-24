<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class D1Service
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(env('D1_API_BASE'), '/'); // e.g. https://laravel-react-d1.oukmnut6.workers.dev
        $this->apiKey = env('D1_API_KEY');              // your API key
    }

    public function getUsers()
    {
        $response = Http::withHeaders([
            'X-API-KEY' => $this->apiKey,
        ])
        ->withoutVerifying() // Disable SSL cert verification (use only for dev/testing)
        ->get("{$this->baseUrl}/users");

        if ($response->successful()) {
            return $response->json('results') ?? [];
        }

        return [];
    }
}
