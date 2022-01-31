<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\BoardMapper;

class BoardService
{
    private BoardMapper $boardMapper;

    public function __construct(BoardMapper $boardMapper)
    {
        $this->boardMapper = $boardMapper;
    }

    public function findAll(): array
    {
        $result = [];

        foreach ($this->boardMapper->findAll() as $entity) {
            array_push($result, $entity->jsonSerialize());
        }

        return $result;
    }
};
