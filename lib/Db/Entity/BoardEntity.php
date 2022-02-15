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
    protected int $deletedAt = 0;
    protected int $lastModified = 0;

    /**
     * @param LabelEntity[] $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return LabelEntity[] $labels
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param StackEntity[] $stacks
     */
    public function setStacks($stacks)
    {
        $this->stacks = $stacks;
    }

    /**
     * @return StackEntity[] $stacks
     */
    public function getStacks(): array
    {
        return $this->stacks;
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
