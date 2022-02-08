<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\BoardMapper;

class BoardService
{
    private BoardMapper $boardMapper;
    private LabelService $labelService;
    private StackService $stackService;

    public function __construct(BoardMapper $boardMapper, LabelService $labelService, StackService $stackService)
    {
        $this->boardMapper = $boardMapper;
        $this->labelService = $labelService;
        $this->stackService = $stackService;
    }

    public function findAll(): array
    {
        $result = array();
        foreach ($this->boardMapper->findAll() as $entity) {
            $labels = $this->labelService->findAllForBoard($entity->id);
            $stacks = $this->stackService->findAllByBoardId($entity->id);
            $entity->setLabels($labels);
            $entity->setStacks($stacks);
            array_push($result, $entity);
        }

        return $result;
    }
};
