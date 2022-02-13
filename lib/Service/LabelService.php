<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\LabelMapper;

class LabelService
{
    private LabelMapper $labelMapper;

    public function __construct(LabelMapper $labelMapper)
    {
        $this->labelMapper = $labelMapper;
    }

    public function findAll(): array
    {
        return $this->labelMapper->findAll();
    }

    public function findAllForBoard(int $id): array
    {
        return $this->labelMapper->findAllForBoard($id);
    }

    public function findAllForCardId(int $id): array
    {
        return $this->labelMapper->findAllForCardId($id);
    }
};
