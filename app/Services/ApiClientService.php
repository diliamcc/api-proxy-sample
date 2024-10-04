<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Encoding\Stream\Debrotli;
use Psr\Http\Message\ResponseInterface;

class ApiClientService
{
    protected Client $client;

    public function __construct(protected readonly string $baseUrl, array $headers = [])
    {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 2.0,
            'headers' => $headers
        ]);
    }

    /**
     * @throws GuzzleException
     */
    protected function get(string $uri, array $query = []): ResponseInterface
    {
        return $this->client->request('GET', $uri, $query);
    }

    /**
     * @throws GuzzleException
     */
    protected function post(string $uri, array $data = []): ResponseInterface
    {
        return $this->client->request('POST', $uri, $data);
    }

    /**
     * @throws GuzzleException
     */
    protected function put(string $uri, array $data = []): ResponseInterface
    {
        return $this->client->request('PUT', $uri, $data);
    }

    /**
     * @throws GuzzleException
     */
    protected function patch(string $uri, array $data = []): ResponseInterface
    {
        return $this->client->request('PATCH', $uri, $data);
    }

    /**
     * @throws GuzzleException
     */
    protected function delete(string $uri, array $data = []): ResponseInterface
    {
        return $this->client->request('DELETE', $uri, $data);
    }
}