<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use PHPUnit\Framework\TestCase;

final class CardApiControllerTest extends TestCase
{
    const BASE_ENPOINT = '/apps/deckrestapi/api/v1/cards';

    public function testGettingAllBoards(): void
    {
        $client = DockerNextcloudRestClient::getInstance();
        $response = $client->requestAuthenticated(DockerNextcloudRestClient::GET, CardApiControllerTest::BASE_ENPOINT);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUserNotBeingLoggedInFails(): void
    {
        $client = DockerNextcloudRestClient::getInstance();
        $response = $client->requestNotAuthenticated(DockerNextcloudRestClient::GET, CardApiControllerTest::BASE_ENPOINT);

        $this->assertEquals(401, $response->getStatusCode());
    }
}
