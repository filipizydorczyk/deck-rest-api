<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\StackMapper;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class StackServiceTest extends TestCase
{
    /** @var CardService|MockObject */
    private  $cardService;
    /** @var StackMapper|MockObject */
    private  $stackMapper;
    /** @var StackService|MockObject */
    private  $stackService;

    public function setUp(): void
    {
        parent::setUp();
        $this->cardService = $this->createMock(CardService::class);
        $this->stackMapper = $this->createMock(StackMapper::class);
        $this->boardService = new StackService($this->cardService, $this->stackMapper);
    }

    // findAllMethod

    // findAllMethod contains cards

    // findAllRelatedToBoard
}
