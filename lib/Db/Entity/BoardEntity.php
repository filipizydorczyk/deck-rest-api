<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;

class BoardEntity extends Entity implements \JsonSerializable
{
    protected $title;
    protected $owner;
    protected $color;
    protected $archived = false;
    /** @var Label[]|null */
    protected $labels = null;
    /** @var Acl[]|null */
    protected $acl = null;
    protected $permissions = [];
    protected $users = [];
    protected $shared;
    protected $stacks = [];
    protected $deletedAt = 0;
    protected $lastModified = 0;

    protected $settings = [];

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'owner' => $this->owner,
            'color' => $this->color,
            'archived' => $this->archived,
            'labels' => $this->labels,
            'permissions' => $this->permissions,
            'users' => $this->users,
            'shared' => $this->shared,
            'stacks' => $this->stacks,
            'deletedAt' => $this->deletedAt,
            'lastModified' => $this->lastModified,
        ];
    }
};
