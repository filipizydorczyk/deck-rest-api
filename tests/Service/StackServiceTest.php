<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Entity\StackEntity;
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
        $this->stackService = new StackService($this->cardService, $this->stackMapper);
    }

    public function testFindAllMethod()
    {
        $stack1 = new StackEntity();
        $stack1->setId(1);

        $stack2 = new StackEntity();
        $stack2->setId(2);

        $stacks = [$stack1, $stack2];

        $this->stackMapper->expects($this->any())->method('findAll')->willReturn($stacks);
        $this->assertEquals(count($this->stackService->findAll()), 2);
    }

    // findAllMethod contains cards

    // findAllRelatedToBoard
}
