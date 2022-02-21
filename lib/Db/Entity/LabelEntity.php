<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class LabelEntity extends Entity implements \JsonSerializable
{

    protected $title;
    protected $color;
    protected int $boardId = 0;
    protected int $lastModified = 0;

    /**
     * @param id id of board label belongs to
     */
    public function setBoardId(int $id)
    {
        $this->boardId = $id;
    }

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'color' => $this->color,
            'boardId' => $this->boardId,
            'lastModified' => $this->lastModified,
        ];
    }
}
