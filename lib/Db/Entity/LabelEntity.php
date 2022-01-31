<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class LabelEntity extends Entity implements \JsonSerializable
{

    protected $title;
    protected $color;
    protected $boardId;
    protected $cardId;
    protected $lastModified;

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'color' => $this->color,
            'boardId' => $this->boardId,
            'cardId' => $this->cardId,
            'lastModified' => $this->lastModified,
        ];
    }
}
