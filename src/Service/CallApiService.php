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

    public function  getAllMange(): array
    {
        return $this->getApi('manga');
    }

    public function getAllAnime(): array
    {
        return $this->getApi('anime');
    }

    private function getApi (string $var): array
    {
        $response = $this->client->request(
            'GET',
            'https://kitsu.io/api/edge/trending/' . $var
        );
        return $response->toArray();
    }
}