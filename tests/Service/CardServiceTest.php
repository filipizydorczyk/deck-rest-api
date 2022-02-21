<?php

declare(strict_types=1);

namespace OCA\DeckREST\Tests;

use OCA\DeckREST\Db\Entity\CardEntity;
use OCA\DeckREST\Db\Entity\LabelEntity;
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
        $this->cardMapper = $this->createMock(CardMapper::class);
        $this->cardService = new CardService($this->cardMapper, $this->labelService);
    }

    public function testFindAll()
    {
        $card = new CardEntity();
        $card->setId(1);

        $this->cardMapper->expects($this->any())->method('findAll')->willReturn([$card]);

        $this->assertEquals(
            count($this->cardService->findAll()),
            1
        );
    }

    public function testFindAllReturnsItsLabels()
    {
        $card = new CardEntity();
        $card->setId(1);

        $label = new LabelEntity();
        $label->setId(2);

        $card->setLabels([$label]);


        $this->cardMapper->expects($this->any())->method('findAll')->willReturn([$card]);
        $this->labelService->expects($this->any())->method('findAllForCardId')->with(1)->willReturn([$card]);

        $this->assertEquals(
            count($this->cardService->findAll()),
            1
        );
        $this->assertEquals(
            count(
                array_values($this->cardService->findAll())[0]->getLabels()
            ),
            1
        );
    }
}
