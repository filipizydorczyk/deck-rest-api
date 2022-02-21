<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use OCA\DeckREST\Db\Entity\BoardEntity;
use OCA\DeckREST\Db\Entity\CardEntity;
use OCA\DeckREST\Db\Entity\LabelEntity;
use OCA\DeckREST\Db\Mapper\LabelMapper;
use OCA\DeckREST\Service\LabelService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class LabelServiceTest extends TestCase
{
    /** @var LabelMapper|MockObject */
    private $labelMapper;
    /** @var LabelService|MockObject */
    private $labelService;


    public function setUp(): void
    {
        parent::setUp();
        $this->labelMapper = $this->createMock(LabelMapper::class);
        $this->labelService = new LabelService($this->labelMapper);
    }

    public function testFindAll()
    {
        $label = new LabelEntity();
        $label->setId(1);

        $this->labelMapper->expects($this->any())->method('findAll')->willReturn([$label]);

        $this->assertEquals(count($this->labelService->findAll()), 1);
    }

    public function testFindAllForBoard()
    {
        $board = new BoardEntity();
        $board->setId(1);

        $label = new LabelEntity();
        $label->setId(2);
        $label->setBoardId(1);

        $this->labelMapper->expects($this->any())->method('findAllForBoard')->with(1)->willReturn([$label]);

        $this->assertEquals(count($this->labelService->findAllForBoard(1)), 1);
    }

    public function testFindAllForCardId()
    {
        $label = new LabelEntity();
        $label->setId(1);

        $card = new CardEntity();
        $card->setId(2);
        $card->setLabels([$label]);

        $this->labelMapper->expects($this->any())->method('findAllForCardId')->with(2)->willReturn([$label]);

        $this->assertEquals(count($this->labelService->findAllForCardId(2)), 1);
    }
}
