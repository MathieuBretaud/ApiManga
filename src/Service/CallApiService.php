<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getApi (): array
    {
        $response = $this->client->request(
            'GET',
            'https://kitsu.io/api/edge/trending/anime'
        );
        return $response->toArray();
    }
}