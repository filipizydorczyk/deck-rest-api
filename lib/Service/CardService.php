<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\CardMapper;

class CardService
{
    private CardMapper $cardMapper;

    public function __construct(CardMapper $cardMapper)
    {
        $this->cardMapper = $cardMapper;
    }

    public function findAll(): array
    {
        $result = [];

        foreach ($this->cardMapper->findAll() as $entity) {
            array_push($result, $entity->jsonSerialize());
        }

        return $result;
    }
};
