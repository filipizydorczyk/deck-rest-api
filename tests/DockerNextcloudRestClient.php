<?php

namespace OCA\DeckREST\Tests;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

final class DockerNextcloudRestClient
{
    private static ?DockerNextcloudRestClient $instance = null;
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";

    private Client $client;

    private function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:4325',
        ]);
    }

    public static function getInstance(): DockerNextcloudRestClient
    {
        if (self::$instance == null) {
            self::$instance = new DockerNextcloudRestClient();
        }
        return self::$instance;
    }

    public function requestAuthenticated($method, $endpoint): ResponseInterface
    {
        return $this->client->request($method, $endpoint, ['auth' => ['test', 'test']]);
    }

    public function requestNotAuthenticated($method, $endpoint): ResponseInterface
    {
        return $this->client->request($method, $endpoint, ['http_errors' => false]);
    }
}
