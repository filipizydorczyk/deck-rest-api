<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class StackEntity extends Entity implements \JsonSerializable
{

    protected $title;
    protected $boardId;
    protected $deletedAt = 0;
    protected $lastModified = 0;
    protected $cards = [];
    protected $order;

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
