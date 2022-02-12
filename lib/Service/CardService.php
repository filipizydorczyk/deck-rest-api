<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\CardMapper;

class CardService
{
    private CardMapper $cardMapper;

    public function __construct(CardMapper $cardMapper)
    {
        $this->cardMapper = $cardMapper;
    }

    public function findAll(): array
    {
        return $this->cardMapper->findAll();
    }

    public function findAllByStackId(int $stackId): array
    {
        return $this->cardMapper->findAllByStackId($stackId);
    }
};
