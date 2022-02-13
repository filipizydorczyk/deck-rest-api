<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class CardEntity extends Entity implements \JsonSerializable
{

    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $descriptionPrev = null;
    protected int $stackId = 0;
    protected ?string $type = null;
    protected int $lastModified = 0;
    protected int $createdAt = 0;
    protected $labels = [];
    protected int $order = 0;
    protected bool $archived = false;
    protected ?int $duedate = null;
    protected int $deletedAt = 0;

    protected $lastEditor;
    protected $owner;
    protected $notified;

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'descriptionPrev' => $this->descriptionPrev,
            'stackId' => $this->stackId,
            'type' => $this->type,
            'lastModified' => $this->lastModified,
            'createdAt' => $this->createdAt,
            'labels' => $this->labels,
            'order' => $this->order,
            'archived' => $this->archived,
            'duedate' => $this->duedate,
            'deletedAt' => $this->deletedAt,
        ];
    }
}
