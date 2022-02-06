<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class BoardEntity extends Entity implements \JsonSerializable
{
    protected $title;
    protected $owner;
    protected $color;
    protected bool $archived = false;
    /** @var Label[] */
    protected $labels = [];
    /** @var StackEntity[] */
    protected $stacks = [];
    protected $deletedAt = 0;
    protected $lastModified = 0;

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'color' => $this->color,
            'archived' => $this->archived,
            'labels' => $this->labels,
            'stacks' => $this->stacks,
            'deletedAt' => $this->deletedAt,
            'lastModified' => $this->lastModified,
        ];
    }
};
