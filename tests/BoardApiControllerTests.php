<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

final class BoardApiControllerTests extends TestCase
{
    public function testBasicTestCase(): void
    {
        $client = new Client([
            'base_uri' => 'http://localhost:4325',
            'auth' => ['test', 'test'],
        ]);

        $response = $client->request('GET', '/apps/deckrestapi/api/v1/boards');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
