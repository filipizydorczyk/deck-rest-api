<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use OCA\DeckREST\Db\Mapper\CardMapper;
use OCA\DeckREST\Service\CardService;
use OCA\DeckREST\Service\LabelService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class CardServiceTest extends TestCase
{

    /** @var LabelService|MockObject */
    private $labelService;
    /** @var CardMapper|MockObject */
    private $cardMapper;
    /** @var CardService|MockObject */
    private $cardService;

    public function setUp(): void
    {
        parent::setUp();
        $this->labelService = $this->createMock(LabelService::class);
        $this->labelMapper = $this->createMock(LabelMapper::class);
        $this->cardService = new CardService($this->cardMapper, $this->labelService);
    }
}
