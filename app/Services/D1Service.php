<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class D1Service
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(env('D1_API_BASE'), '/');
        $this->apiKey = env('D1_API_KEY');
    }

    public function getUsers()
    {
        $response = Http::withHeaders([
            'X-API-KEY' => $this->apiKey,
        ])->get("{$this->baseUrl}/users");

        if ($response->successful()) {
            return $response->json('results');
        }

        return null;
    }

    // You can add more methods like:
    // public function createUser($data) { ... }
}
