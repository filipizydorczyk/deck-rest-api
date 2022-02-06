<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use PHPUnit\Framework\TestCase;

final class BoardApiControllerTests extends TestCase
{
    public function testBasicTestCase(): void
    {
        $client = DockerNextcloudRestClient::getInstance();
        $response = $client->request(DockerNextcloudRestClient::GET, '/apps/deckrestapi/api/v1/boards');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
