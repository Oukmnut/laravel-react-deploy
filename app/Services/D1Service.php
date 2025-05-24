<?php

namespace App\Services;

use GuzzleHttp\Client;

class D1Service
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false, // disable SSL verify if needed
            'base_uri' => config('services.d1.base_url'),
        ]);
    }

    public function getUsers()
    {
        $response = $this->client->get('/users', [
            'headers' => [
                'X-API-KEY' => config('services.d1.api_key'),
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return null;
    }
}
