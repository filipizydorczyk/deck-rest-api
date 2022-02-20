<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Entity\BoardEntity;
use OCA\DeckREST\Db\Entity\CardEntity;
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

    public function testFindAllMethodContainsCards()
    {
        $stack1 = new StackEntity();
        $stack1->setId(1);
        $stack2 = new StackEntity();
        $stack2->setId(2);

        $card1 = new CardEntity();
        $card1->setId(3);
        $card1->setStackId(1);

        $card2 = new CardEntity();
        $card2->setId(4);
        $card2->setStackId(2);

        $card3 = new CardEntity();
        $card3->setId(5);
        $card3->setStackId(2);

        $this->stackMapper->expects($this->any())->method('findAll')->willReturn([$stack1, $stack2]);
        $this->cardService->expects($this->any())
            ->method('findAllByStackId')
            ->will(
                $this->returnValueMap([
                    [1, [$card1]],
                    [2, [$card2, $card3]],
                ])
            );

        $this->assertEquals(count($this->stackService->findAll()), 2);
        $this->assertEquals(
            count(
                array_values($this->stackService->findAll())[0]->getCards()
            ),
            1
        );
        $this->assertEquals(
            count(
                array_values($this->stackService->findAll())[1]->getCards()
            ),
            2
        );
    }

    public function testFindAllByBoardId()
    {
        $board1 = new BoardEntity();
        $board1->setId(1);
        $board2 = new BoardEntity();
        $board2->setId(2);

        $stack1 = new StackEntity();
        $stack1->setId(3);
        $stack1->setBoardId(1);
        $stack2 = new StackEntity();
        $stack2->setId(4);
        $stack2->setBoardId(1);

        $this->stackMapper->expects($this->any())->method('findAllByBoardId')->will(
            $this->returnValueMap([
                [1, [$stack1, $stack2]],
                [2, []],
            ])
        );

        $this->assertEquals(count($this->stackService->findAllByBoardId(1)), 2);
        $this->assertEquals(count($this->stackService->findAllByBoardId(2)), 0);
    }

    public function testFindAllByBoardIdIncludesCards()
    {
        $board1 = new BoardEntity();
        $board1->setId(1);
        $board2 = new BoardEntity();
        $board2->setId(2);

        $stack1 = new StackEntity();
        $stack1->setId(3);
        $stack1->setBoardId(1);
        $stack2 = new StackEntity();
        $stack2->setId(4);
        $stack2->setBoardId(1);

        $card1 = new CardEntity();
        $card1->setId(5);
        $card1->setStackId(4);

        $this->stackMapper->expects($this->any())->method('findAllByBoardId')->will(
            $this->returnValueMap([
                [1, [$stack1, $stack2]],
                [2, []],
            ])
        );

        $this->cardService->expects($this->any())->method('findAllByStackId')->will(
            $this->returnValueMap([
                [3, []],
                [4, [$card1]],
            ])
        );

        $this->assertEquals(count($this->stackService->findAllByBoardId(1)), 2);
        $this->assertEquals(count($this->stackService->findAllByBoardId(2)), 0);

        $this->assertEquals(
            count(
                array_values($this->stackService->findAllByBoardId(1))[0]->getCards()
            ),
            0
        );
        $this->assertEquals(
            count(
                array_values($this->stackService->findAllByBoardId(1))[1]->getCards()
            ),
            1
        );
    }
}
