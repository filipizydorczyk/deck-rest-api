<?php

namespace OCA\DeckREST\Service;

use OCA\DeckREST\Db\Mapper\StackMapper;

class StackService
{
    private CardService $cardService;
    private StackMapper $stackMapper;

    public function __construct(CardService $cardService, StackMapper $stackMapper)
    {
        $this->cardService = $cardService;
        $this->stackMapper = $stackMapper;
    }

    public function findAll(): array
    {
        $result = array();

        foreach ($this->stackMapper->findAll() as $entity) {
            $cards = $this->cardService->findAllByStackId($entity->id);
            $entity->setCards($cards);
            array_push($result, $entity);
        }

        return $result;
    }

    public function findAllByBoardId(int $id): array
    {
        $result = array();

        foreach ($this->stackMapper->findAllByBoardId($id) as $entity) {
            $cards = $this->cardService->findAllByStackId($entity->id);
            $entity->setCards($cards);
            array_push($result, $entity);
        }

        return $result;
    }
};
