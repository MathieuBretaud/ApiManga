<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllManga(): array
    {
        return $this->getApi('manga');
    }

    public function getAllAnime(): array
    {
        return $this->getApi('anime');
    }

    public function getAllAnimeId($id): array
    {
        $response = $this->client->request(
            'GET',
            'https://kitsu.io/api/edge/anime/'.$id
        );

        return $response->toArray();
    }

    private function getApi(string $var): array
    {
        $response = $this->client->request(
            'GET',
            'https://kitsu.io/api/edge/trending/'.$var
        );

        return $response->toArray();
    }
}
