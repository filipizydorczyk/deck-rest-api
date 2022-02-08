<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class BoardEntity extends Entity implements \JsonSerializable
{
    protected $title;
    protected $owner;
    protected $color;
    protected bool $archived = false;
    /** @var LabelEntity[] */
    protected $labels = [];
    /** @var StackEntity[] */
    protected $stacks = [];
    protected $deletedAt = 0;
    protected $lastModified = 0;

    /**
     * @param LabelEntity[] $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @param StackEntity[] $labels
     */
    public function setStacks($stacks)
    {
        $this->stacks = $stacks;
    }

    public function jsonSerialize()
    {
        $labelsJson = array();
        $stacksJson = array();

        foreach ($this->labels as $entity) {
            array_push($labelsJson, $entity->jsonSerialize());
        }

        foreach ($this->stacks as $entity) {
            array_push($stacksJson, $entity->jsonSerialize());
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'color' => $this->color,
            'archived' => $this->archived,
            'labels' => $labelsJson,
            'stacks' => $stacksJson,
            'deletedAt' => $this->deletedAt,
            'lastModified' => $this->lastModified,
        ];
    }
};
