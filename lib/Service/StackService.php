<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\StackMapper;

class StackService
{
    private StackMapper $stackMapper;

    public function __construct(StackMapper $stackMapper)
    {
        $this->stackMapper = $stackMapper;
    }

    public function findAll(): array
    {
        $result = [];

        foreach ($this->stackMapper->findAll() as $entity) {
            array_push($result, $entity->jsonSerialize());
        }

        return $result;
    }
};
