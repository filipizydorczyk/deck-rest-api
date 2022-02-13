<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\CardMapper;

class CardService
{
    private CardMapper $cardMapper;
    private LabelService $labelService;

    public function __construct(CardMapper $cardMapper, LabelService $labelService)
    {
        $this->cardMapper = $cardMapper;
        $this->labelService = $labelService;
    }

    public function findAll(): array
    {
        $result = array();
        foreach ($this->cardMapper->findAll() as $entity) {
            $labels = $this->labelService->findAllForCardId($entity->id);
            $entity->setLabels($labels);
            array_push($result, $entity);
        }

        return $result;
    }

    public function findAllByStackId(int $stackId): array
    {
        return $this->cardMapper->findAllByStackId($stackId);
    }
};
