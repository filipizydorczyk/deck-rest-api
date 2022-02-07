<?php

namespace OCA\DeckREST\Db\Entity;

use FG\ASN1\Universal\Boolean;
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

    /**
     * @param Label[] $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function jsonSerialize()
    {
        $labelsJson = array();

        foreach ($this->labels as $entity) {
            array_push($labelsJson, $entity->jsonSerialize());
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'color' => $this->color,
            'archived' => $this->archived,
            'labels' => $labelsJson,
            'stacks' => $this->stacks,
            'deletedAt' => $this->deletedAt,
            'lastModified' => $this->lastModified,
        ];
    }
};
