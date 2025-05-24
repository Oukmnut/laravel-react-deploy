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
        $response = Http::withOptions([
            'verify' => false,   // disable SSL cert check (local dev only)
        ])->withHeaders([
            'X-API-KEY' => $this->apiKey,
        ])->get("{$this->baseUrl}/users");

        if ($response->successful()) {
            return $response->json('results');
        }

        return null;
    }

}
