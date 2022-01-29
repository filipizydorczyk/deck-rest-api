<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\LabelMapper;

class LabelService
{
    private LabelMapper $labelMapper;

    public function __construct(LabelMapper $labelMapper)
    {
        $this->labelMapper = $labelMapper;
    }

    public function findAll(): array
    {
        $result = [];

        foreach ($this->labelMapper->findAll() as $entity) {
            array_push($result, $entity->jsonSerialize());
        }

        return $result;
    }
};
