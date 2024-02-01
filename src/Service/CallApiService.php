<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }
    public function getWeatherData(): array
    {
        $tokenApi = '892290b3ec6e3ad5c8f0faa2f553ced0099f22c0d5dc3a26fbe6a0b2cf45e097';

        $response = $this->client->request(
            'GET',
            'https://api.meteo-concept.com/api/forecast/daily?token=' . $tokenApi . '&insee=40304',
        );
        return $response->toArray();
    }
}
