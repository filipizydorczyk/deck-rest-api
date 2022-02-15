<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use OCA\DeckREST\Db\Entity\BoardEntity;
use OCA\DeckREST\Db\Entity\LabelEntity;
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

    public function testGettingLabelsForBoard(): void
    {
        $board1 = new BoardEntity();
        $board1->setId(1);
        $board2 = new BoardEntity();
        $board2->setId(2);

        $label = new LabelEntity();
        $label->setId(3);
        $board2->setLabels([$label]);

        $this->boardMapper->expects($this->any())->method('findAll')->willReturn([$board1, $board2]);
        $this->labelService->expects($this->any())
            ->method('findAllForBoard')
            ->will(
                $this->returnValueMap([
                    [1, []],
                    [2, [$label]],
                ])
            );

        $this->assertEquals(
            count(
                array_values($this->boardService->findAll())[0]->getLabels()
            ),
            0
        );
        $this->assertEquals(
            count(
                array_values($this->boardService->findAll())[1]->getLabels()
            ),
            1
        );
    }

    public function testGettingStacksForBoards(): void
    {
        $this->assertEquals(true, true);
    }
}
