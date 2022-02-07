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
        return $this->boardMapper->findAll();
    }
};
