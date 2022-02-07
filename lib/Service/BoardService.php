<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\BoardMapper;

class BoardService
{
    private BoardMapper $boardMapper;
    private LabelService $labelService;

    public function __construct(BoardMapper $boardMapper, LabelService $labelService)
    {
        $this->boardMapper = $boardMapper;
        $this->labelService = $labelService;
    }

    public function findAll(): array
    {
        $result = array();
        foreach ($this->boardMapper->findAll() as $entity) {
            $labels = $this->labelService->findAllForBoard($entity->id);
            $entity->setLabels($labels);
            array_push($result, $entity);
        }

        return $result;
    }
};
