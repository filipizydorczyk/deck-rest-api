<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use PHPUnit\Framework\TestCase;

final class StackApiControllerTest extends TestCase
{
    const BASE_ENPOINT = '/apps/deckrestapi/api/v1/stacks';

    public function testGettingAllStacks(): void
    {
        $client = DockerNextcloudRestClient::getInstance();
        $response = $client->requestAuthenticated(DockerNextcloudRestClient::GET, StackApiControllerTest::BASE_ENPOINT);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUserNotBeingLoggedInFails(): void
    {
        $client = DockerNextcloudRestClient::getInstance();
        $response = $client->requestNotAuthenticated(DockerNextcloudRestClient::GET, StackApiControllerTest::BASE_ENPOINT);

        $this->assertEquals(401, $response->getStatusCode());
    }
}
