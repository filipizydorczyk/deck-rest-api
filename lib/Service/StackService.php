<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\StackMapper;

class StackService
{
    private StackMapper $stackMapper;

    public function __construct(StackMapper $stackMapper)
    {
        $this->stackMapper = $stackMapper;
    }

    public function findAll(): array
    {
        return $this->stackMapper->findAll();
    }

    public function findAllByBoardId(int $id): array
    {
        return $this->stackMapper->findAllByBoardId($id);
    }
};
