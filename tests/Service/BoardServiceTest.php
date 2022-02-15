<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use OCA\DeckREST\Db\Entity\BoardEntity;
use OCA\DeckREST\Db\Mapper\BoardMapper;
use OCA\DeckREST\Service\BoardService;
use OCA\DeckREST\Service\LabelService;
use OCA\DeckREST\Service\StackService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class BoardServiceTest extends TestCase
{
    /** @var BoardMapper|MockObject */
    private $boardMapper;
    /** @var LabelService|MockObject */
    private $labelService;
    /** @var StackService|MockObject */
    private $stackService;
    /** @var BoardService|MockObject */
    private $boardService;

    public function setUp(): void
    {
        parent::setUp();
        $this->boardMapper = $this->createMock(BoardMapper::class);
        $this->labelService = $this->createMock(LabelService::class);
        $this->stackService = $this->createMock(StackService::class);
        $this->boardService = new BoardService($this->boardMapper, $this->labelService, $this->stackService);
    }

    public function testGettingAllBoards(): void
    {
        $board = new BoardEntity();
        $board->setId(1);

        $boards = [$board];

        $this->boardMapper->expects($this->any())->method('findAll')->willReturn($boards);
        $this->assertEquals(count($this->boardService->findAll()), 1);
    }
}
