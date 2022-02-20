<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class StackEntity extends Entity implements \JsonSerializable
{

    protected $title;
    protected int $boardId = 0;
    protected int $deletedAt = 0;
    protected int $lastModified = 0;
    protected $cards = [];
    protected int $order = 0;

    public function setCards(array $cards)
    {
        $this->cards = $cards;
    }

    /**
     * @return array card entities that belongs to stack
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'boardId' => $this->boardId,
            'deletedAt' => $this->deletedAt,
            'lastModified' => $this->lastModified,
            'cards' => $this->cards,
            'order' => $this->order
        ];
    }
}
